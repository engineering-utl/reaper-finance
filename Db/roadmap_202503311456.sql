INSERT INTO Revival.roadmap (roadmap_date,description,status,created_at) VALUES
	 ('2025-03-29','The 3rd round of debt payments were mailed out today for RPR
                token holders. We’ve seen great success with the most recent
                payments getting applied since the architecture changes and have
                further opened the beta testing group. RPR token holders that
                are US citizens and have gone through the KYC process in the
                debt reaping application can submit a debt to be reaped and once
                approved apply their voting power towards it.','enabled','2025-03-21 19:20:45'),
	 ('2025-03-28','The challenges for submitting digital payments to RPR token
                holders debts has been tough, but we’re committed to making our
                vision come to reality. ACH payments have not been reliable, as
                we don’t get enough characters in the payment memo to ensure
                it’s applied to the proper liability account.  As a short term
                workaround (until better real-time payments become available),
                we’re going to plan to implement a traditional paper check
                method for debt payments.  This is something new for our payment
                processor as well, and we’re working together to build, test,
                and deploy this capability in the coming months','enabled','2025-03-21 19:31:09'),
	 ('2025-04-25','We have successfully tested our Debt Reaping application in our
                payment processor’s development environment. As a result, we’ve
                gained access to their production environment, allowing us to
                integrate with live banking systems. We are also wrapping up
                batch processing of payments, and implementing a method for
                manual verifications for debts that aren’t supported by Plaid.','enabled','2025-03-21 19:56:50'),
	 ('2025-05-21','We are moving forward with test payments to the Smoke Testing
                group, and will set aside their debt reaping amounts from this
                Reaping. The payments will not be made same-day, but within the
                next two weeks. Many banks may not process on the weekends so we
                will also be analyzing payment throughput and potentially move
                the ‘Reaping Day’ to Mondays in the future if it smooths the
                process. To be clear, not all Beta Testers will receive test
                payments this round; only the Smoke Test group. The Smoke
                Testers will receive test payments relative to their own vote.
                Thanks everyone for your continued patience.','enabled','2025-03-21 19:57:09'),
	 ('2025-08-20','Two years after our initial launch announcement, there is no
                more fitting time to announce the Integrated-Beta phase of our
                keystone product. You may now log into:<a href="#"
                  >https://customer.development.dashboard.reaper.financial</a
                >  You may connect your KYC/AML data as well as one Liability if
                you choose. Assigning debt and token votes is open; however,
                your vote towards your liability will not be applied until it is
                phased in during further beta testing. Our 52nd Reaping was a
                ‘Token Only’ vote, in which we tested to ensure our legacy
                product of Burn-as-a-Service has made the transition to our new
                voting system. Any votes applied to Debt will not count during
                the 52nd Reaping.<br />
                Looking forward, we will begin intermittent testing of payments
                to liabilities of U.S. customers only in small amounts over the
                next 2-4 weeks. Once we are satisfied with the internal process
                of sending transactions through our payment processor, we will
                begin integrating U.S. customer’s Debt Reaping into the live
                Reaping vote, starting with the participants from the closed
                beta.<br />
                **Please understand that this is a Beta, and by connecting
                personal data, you are taking the risk upon yourself. The KYC
                system gathers Date of Bith, Address, Name and Wallet Address,
                which are encrypted. Bank account information is stored securely
                within the Plaid system. An incursion is unlikely; however, the
                possibility is never zero. The risks associated with a data leak
                are also low, but not zero. Penetration testing is ongoing.
                ***Reaper Financial has a specific Telegram channel for support
                and bug reports. Debt Reaping Bugs: <a href="#"
                  >https://t.me/+fcXlyDMLfFUzYWFh</a
                > There is no other Reaper Financial ‘Support Page,’ especially
                not on X (Twitter) or Facebook. We will NEVER ask for your Seed,
                Secret Key, Bank Account Numbers, Identification. We will NEVER
                ask you to send a transaction, nor will we contact you first for
                any reason through any social media. When in doubt, please
                verify that you are speaking to a real Reaper Financial
                representative and do not share any form of credentials over any
                social media or messaging medium.','enabled','2025-03-21 19:57:37');
