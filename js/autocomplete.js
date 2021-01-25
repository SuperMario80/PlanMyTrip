const createAutoComplete = ({ root, renderOption, onOptionSelect, inputValue, fetchData }) => {
	root.innerHTML = `
    <input class="input" placeholder="Search Location"/>
    <div class="dropdown">
      <div class="dropdown-menu">
        <div class="dropdown-content results"></div>
      </div>
    </div>
  `;

	const input = root.querySelector('input');
	const dropdown = root.querySelector('.dropdown');
	const resultsWrapper = root.querySelector('.results');
	// console.log(window);
	// console.log(onOptionSelect);
	// console.log(renderOption);
	// console.log(inputValue);

	const onInput = async (event) => {
		const items = await fetchData(event.target.value);
		console.log(items);

		if (!items.length) {
			dropdown.classList.remove('is-active');
			return;
		}

		resultsWrapper.innerHTML = '';
		dropdown.classList.add('is-active');
		for (let item of items) {
			const option = document.createElement('a');

			option.classList.add('dropdown-item');
			option.innerHTML = renderOption(item);
			option.addEventListener('click', () => {
				dropdown.classList.remove('is-active');
				input.value = inputValue(item);
				onOptionSelect(item);
				console.log(item);
			});

			resultsWrapper.appendChild(option);
		}
	};
	input.addEventListener('input', debounce(onInput, 500));

	document.addEventListener('click', (event) => {
		if (!root.contains(event.target)) {
			dropdown.classList.remove('is-active');
		}
		input.value = '';
	});
};
