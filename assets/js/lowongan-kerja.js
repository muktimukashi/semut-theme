(function () {
	const careerPage = document.querySelector(".career-page");

	if (!careerPage) {
		return;
	}

	const accordionButtons = careerPage.querySelectorAll(".career-accordion-trigger");
	const filterButtons = careerPage.querySelectorAll(".career-filter-button");
	const jobCards = careerPage.querySelectorAll(".career-job-card");

	function closeAccordion(button) {
		const panel = button.nextElementSibling;

		button.setAttribute("aria-expanded", "false");
		button.textContent = "Lihat Kualifikasi";

		if (panel) {
			panel.hidden = true;
		}
	}

	function openAccordion(button) {
		const panel = button.nextElementSibling;

		button.setAttribute("aria-expanded", "true");
		button.textContent = "Tutup Kualifikasi";

		if (panel) {
			panel.hidden = false;
		}
	}

	accordionButtons.forEach((button) => {
		button.addEventListener("click", () => {
			const isOpen = button.getAttribute("aria-expanded") === "true";

			accordionButtons.forEach(closeAccordion);

			if (!isOpen) {
				openAccordion(button);
			}
		});
	});

	filterButtons.forEach((button) => {
		button.addEventListener("click", () => {
			const filter = button.dataset.filter;

			filterButtons.forEach((item) => item.classList.remove("active"));
			button.classList.add("active");

			jobCards.forEach((card) => {
				const categories = card.dataset.category.split(" ");
				const shouldShow = filter === "all" || categories.includes(filter);

				card.classList.toggle("is-hidden", !shouldShow);
			});
		});
	});
}());
