document.addEventListener("DOMContentLoaded", () => {
	const page = window.location.pathname.split("/").pop().split(".").shift(); // Get the page name
	const content = document.getElementById("content");
	const imageUpload = document.getElementById("imageUpload");

	// Set contenteditable based on admin login status
	const isAdminLoggedIn = localStorage.getItem("isAdmin") === btoa("true");

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
							element.src = mergedJson[id];
						} else {
							element.innerHTML = mergedJson[id]; // Use innerHTML for contenteditable elements
						}
					}
				}
			} else {
				console.error("Error: Loaded JSON is empty or invalid.");
			}
		})
		.catch((error) => console.error("Error loading content:", error));

	// Save content to JSON
	function saveContent() {
		const elements = content.querySelectorAll(".editable");
		const data = {};

		elements.forEach((element) => {
			if (element.tagName === "IMG") {
				data[element.id] = element.src;
			} else {
				data[element.id] = element.innerHTML; // Use innerHTML to save content from contenteditable
			}
		});

		fetch(`${window.location.origin}/save_text.php`, {
			method: "POST",
			headers: {
				"Content-Type": "application/json",
			},
			body: JSON.stringify({ page, data }),
		})
			.then((response) => response.json())
			.then((result) => console.log("Content saved:", result))
			.catch((error) => console.error("Error saving content:", error));
	}

	// Handle text edit
	content.addEventListener("input", (event) => {
		saveContent();
	});

	// Handle image click and upload
	content.addEventListener("click", (event) => {
		if (event.target.tagName === "IMG") {
			if (isAdminLoggedIn) {
				imageUpload.click();
			}
			imageUpload.onchange = (e) => {
				const file = e.target.files[0];
				const reader = new FileReader();

				reader.onload = (e) => {
					event.target.src = e.target.result;
					saveContent();
				};

				reader.readAsDataURL(file);

				// Simulate saving image to server and getting the path
				const formData = new FormData();
				formData.append("image", file);

				fetch(`${window.location.origin}/save_image.php`, {
					method: "POST",
					body: formData,
				})
					.then((response) => response.json())
					.then((result) => {
						event.target.src = result.path;
						saveContent();
					})
					.catch((error) => console.error("Error uploading image:", error));
			};
		}
	});
});
