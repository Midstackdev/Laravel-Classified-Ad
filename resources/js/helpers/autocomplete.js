import autocomplete from 'autocomplete.js'
import algolia from 'algoliasearch'

let client = algolia('8JY9VUMZR2', '66ae6f5cb7202b6ea9120f6bc3c764d5')

export const listingsautocomplete = (selector) => {

	let index = client.initIndex('listings')

	return autocomplete(selector, {}, [
		{
			source: autocomplete.sources.hits(index, { hitsPerPage: 5 }),
			templates: {
				suggestion (suggestion) {
					return '<span>' + suggestion.title + '</span>'
				}
			},
			displayKey: 'title',
			empty: '<div class="aa-empty">No listings found</div>'
		}
	])
}