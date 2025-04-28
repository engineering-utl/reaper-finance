document.addEventListener("DOMContentLoaded", () => {
	const page = window.location.pathname.split("/").pop().split(".").shift();
	const content = document.getElementById("content");
	const imageUpload = document.getElementById("imageUpload");

	const isAdminLoggedIn = localStorage.getItem("isAdmin") === btoa("true");

	// Debounce helper
	function debounce(func, delay = 800) {
		let timeout;
		return function (...args) {
			clearTimeout(timeout);
			timeout = setTimeout(() => func.apply(this, args), delay);
		};
	}

	// Hide all progress bars initially
	function hideAllProgress() {
		document.querySelectorAll(".inline-progress, .inline-progress-label").forEach(el => {
			el.style.display = "none";
		});
	}

	hideAllProgress();

	// Progress bar helpers
	function showElementProgress(targetElement, percent, label = "Saving...") {
		let bar = targetElement.querySelector(".inline-progress");
		let labelElem = targetElement.querySelector(".inline-progress-label");

		if (!bar) {
			bar = document.createElement("div");
			bar.className = "inline-progress";
			bar.style.position = "absolute";
			targetElement.appendChild(bar);
		}

		if (!labelElem) {
			labelElem = document.createElement("div");
			labelElem.className = "inline-progress-label";
			labelElem.style.position = "absolute";
			targetElement.appendChild(labelElem);
		}

		bar.style.display = "block";
		labelElem.style.display = "block";

		bar.style.width = percent + "%";
		labelElem.textContent = label;
	}

	function hideElementProgress(targetElement) {
		setTimeout(() => {
			const bar = targetElement.querySelector(".inline-progress");
			const labelElem = targetElement.querySelector(".inline-progress-label");

			if (bar) bar.style.display = "none";
			if (labelElem) labelElem.style.display = "none";
		}, 1500);
	}

	// Make elements non-editable if not admin
	if (!isAdminLoggedIn) {
		const editableElements = content.querySelectorAll(".editable");
		editableElements.forEach((element) => {
			element.setAttribute("contenteditable", false);
			element.classList.replace("editable", "non-editable");
		});
	}

	// Load content from JSON
	fetch(`${window.location.origin}/content.json`)
		.then((response) => response.json())
		.then((data) => {
			if (data) {
				const mergedJson = Object.assign({}, data[page], data[""]);
				for (const id in mergedJson) {
					const element = document.getElementById(id);
					if (element) {
						if (element.tagName === "IMG") {
							element.dataset.originalSrc = mergedJson[id];
							element.src = mergedJson[id];
						} else {
							element.dataset.originalContent = mergedJson[id];
							element.innerHTML = mergedJson[id];
						}
					}
				}
			}
		})
		.catch((error) => console.error("Error loading content:", error));

	// Save content to JSON
	function saveContent(editedElement = null) {
		const elements = content.querySelectorAll(".editable");
		const data = {};
		let somethingChanged = false;

		// Iterate through all editable elements to check for changes
		elements.forEach((element) => {
			if (element.tagName === "IMG") {
				const current = element.src;
				const original = element.dataset.originalSrc || "";

				// Only track changes if the image source is different
				if (current !== original) {
					data[element.id] = current;
					somethingChanged = true;
				}
			} else {
				const current = element.innerHTML;
				const original = element.dataset.originalContent || "";

				// Only track changes if the content is different
				if (current !== original) {
					data[element.id] = current;
					somethingChanged = true;
				}
			}
		});

		// If no changes were made, return early
		if (!somethingChanged) return;

		// Show progress bar for the edited element
		if (editedElement) {
			showElementProgress(editedElement, 100, "Saving...");
		}

		// Send the content changes to the server
		fetch(`${window.location.origin}/save_text.php`, {
			method: "POST",
			headers: {
				"Content-Type": "application/json",
			},
			body: JSON.stringify({ page, data }),
		})
			.then((response) => response.json())
			.then((result) => {
				// If the save was successful
				if (result.status === "success") {
					// Update the original content or image src for tracking
					for (const id in data) {
						const el = document.getElementById(id);
						if (el) {
							if (el.tagName === "IMG") {
								// Update originalSrc for images
								el.dataset.originalSrc = el.src;
							} else {
								// Update originalContent for text elements
								el.dataset.originalContent = el.innerHTML;
							}
						}
					}

					// Hide progress bar for the edited element
					if (editedElement) {
						hideElementProgress(editedElement);
					}
				} else {
					// Handle save failure scenario
					console.error("Error: Save failed on the server");
					if (editedElement) {
						showElementProgress(editedElement, 100, "Save failed!");
					}
				}
			})
			.catch((error) => {
				// Handle network or other errors
				console.error("Error saving content:", error);
				if (editedElement) {
					showElementProgress(editedElement, 100, "Save failed!");
				}
			});
	}
	

	const debouncedSave = debounce((editedElement) => {
		saveContent(editedElement);
	}, 800);

	// Handle text edit
	content.addEventListener("input", (event) => {
		const target = event.target.closest(".editable");
		if (target) {
			debouncedSave(target);
		}
	});

	// Handle image click and upload
	content.addEventListener("click", (event) => {
		if (event.target.tagName === "IMG" && isAdminLoggedIn) {
			imageUpload.click();

			imageUpload.onchange = (e) => {
				const file = e.target.files[0];
				if (!file) return;

				const reader = new FileReader();
				const wrapper = event.target.parentElement;

				reader.onload = (e) => {
					const newSrc = e.target.result;
					// Only save if the new image is different
					if (event.target.src !== newSrc) {
						event.target.src = newSrc;
						saveContent(wrapper);
					}
				};
				reader.readAsDataURL(file);

				const formData = new FormData();
				formData.append("image", file);

				const xhr = new XMLHttpRequest();
				xhr.open("POST", `${window.location.origin}/save_image.php`, true);

				xhr.upload.onprogress = (e) => {
					if (e.lengthComputable) {
						const percentComplete = Math.round((e.loaded / e.total) * 100);
						showElementProgress(wrapper, percentComplete, `Uploading... ${percentComplete}%`);
					}
				};

				xhr.onload = () => {
					if (xhr.status === 200) {
						const result = JSON.parse(xhr.responseText);
						if (event.target.src !== result.path) {
							event.target.src = result.path;
							saveContent(wrapper);
							showElementProgress(wrapper, 100, "Upload complete!");
							hideElementProgress(wrapper);
						}
					} else {
						showElementProgress(wrapper, 100, "Upload failed!");
					}
				};

				xhr.onerror = () => {
					showElementProgress(wrapper, 100, "Upload error!");
				};

				xhr.send(formData);
			};
		}
	});
});
