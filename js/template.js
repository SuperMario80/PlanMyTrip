{
	/* <li class="item">
                  
                    <div class="item-image"><img src="${value.images[0].sizes.medium.url}" class="zoom" alt=""></div>
                    <div class="item-text">
                        <div class="item-text-wrap">
                            <div class="zoom-image-holder__inner results-grid-result__inner">
                                <span class="results-grid-result">
                                    <a href="" data-post_title="${value.attribution[1]
                                        .url}" data-post_name="" data-post_id="" data-result_index="">
                                        <span class="results-grid-result__title">${value.name}</span>
                                    </a>
                                    <a href="" data-post_title="${value.attribution[0]
                                        .url}" data-post_name="" data-post_id="" data-result_index="">
                                        <span class="results-grid-result__subtitle">${value.location_ids[0]}</span>
                                        </a>
                                        <span class="results-grid-result__subtitle">${value.location_ids[2]}</span>
                                    </span>
                                    <ul class="results-grid-result__meta"></ul>
                
                            </div>
                        </div>
                    </div>
                <div class="content">${value.snippet}</div>
                <button type="button" id="poiSubmit${poiCount}" data-count="${poiCount}" value="poiSubmit${poiCount}" class="button block right">Submit</button>
</li> */
}
{
	/* <div class="item">
            
                <div class="item-image">
                <img src="img\showcase3.jpg" alt="" />
                </div>
                    <div class="item-text">
                        <div class="item-text-wrap">
                            <h2 class="item-text-title"><a href="http://www.openstreetmap.org/" >Middle Rhine</a></h2>
                            <p class="item-text-category"><a href="http://en.wikipedia.org/wiki/Middle%20Rhine">Germany</a></p>
                            <button type="button" id="poiSubmit0" data-count="0" value="poiSubmit0" class="button block center">Submit
                            </button>
                        </div>
                    </div>
                <div class="item-desc">Ferry across the Rhine from Niederheimbach.</div> */
}

const poiTemplate = (value) => {
	//1st element
	const itemDiv = document.createElement('div');
	itemDiv.className = 'item';

	//2nd element with childNode
	const imgDiv = document.createElement('div');
	imgDiv.className = 'item-image';
	const img = document.createElement('img');
	img.setAttribute('src', `${value.images[0].sizes.medium.url}`);

	const itemTextDiv = document.createElement('div');
	itemTextDiv.className = 'item-text';

	const itwDiv = document.createElement('div');
	itwDiv.className = 'item-text-wrap';

	const poiName = document.createElement('h2');
	poiName.className = 'item-text-title';

	const poiLink = document.createElement('a');
	poiLink.setAttribute('href', `${value.attribution[1].url}`);
	poiLink.createTextNode(`${value.name}`);
	poiName.appendChild(poiLink);

	const country = document.createElement('p');
	country.className = 'item-text-category';

	const wikiLink = document.createElement('a');
	wikiLink.setAttribute('href', `${value.attribution[0].url}`);
	wikiLink.createTextNode(`${value.location_ids[2]}`);
	country.appendChild(wikiLink);

	const btn = document.createElement('button');
	btn.className = 'button block center';
	btn.id = `poiSubmit${poiCount}`;
	btn.setAttribute('type', 'button');
	btn.setAttribute('data-count', `${poiCount}`);
	btn.setAttribute('value', `poiSubmit${poiCount}`);
	btn.createTextNode('Submit');

	const itemDesc = document.createElement('div');
	itemDesc.className = 'item-desc';
	itemDesc.innerHTML = `${value.snippet}`;

	poiName.insertAdjacentElement('afterend', country);
	country.insertAdjacentElement('afterend', btn);
	imgDiv.appendChild(img);

	itwDiv.appendChild(poiName);
	itemTextDiv.appendChild(itwDiv);
	itemDiv.appendChild(imgDiv);
	itemDiv.insertAdjacentElement('afterend', itemDesc);
};
