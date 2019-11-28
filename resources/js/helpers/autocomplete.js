import autocomplete from 'autocomplete.js'
import algolia from 'algoliasearch'

let client = algolia('8JY9VUMZR2', '66ae6f5cb7202b6ea9120f6bc3c764d5')

export const listingsautocomplete = (selector, { categoryId, areaIds }) => {

	let index = client.initIndex('listings')

	let areaFilters = 'area.id = ' + areaIds.join(' OR area.id = ')
	let filters = areaFilters

	if (typeof categoryId !== 'undefined') {
		filters = filters + ' AND category.id != ' + categoryId
	}

	let sources = [{
		source: autocomplete.sources.hits(index, { hitsPerPage: 5, filters: filters + ' AND live = 1' }),
		templates: {
			header: () => {
				if (typeof categoryId !== 'undefined') {
					return '<div class="algolia-suggestions-category">Other categories</div>'	
				}

				return '<div class="algolia-suggestions-category">All categories</div>'
			},
			suggestion (suggestion) {
				return '<span><a href="/'+ suggestion.area.slug + '/' + suggestion.id + '">'+ suggestion.title +'</a> in '+ suggestion.category.name +'</span> <span>'+ suggestion.created_at_human +' &bull; '+ suggestion.area.name +'</span>'
			}
		},
		displayKey: 'title',
		empty: '<div class="aa-empty">No listings found</div>'
	}]

	if (typeof categoryId !== 'undefined') {
		sources.unshift({
			source: autocomplete.sources.hits(index, { hitsPerPage: 5, filters: '(' + areaFilters + ') AND category.id = ' + categoryId + ' AND live = 1' }),
			templates: {
				header: '<div class="algolia-suggestions-category">This category</div>',
				suggestion (suggestion) {
					return '<span><a href="/'+ suggestion.area.slug + '/' + suggestion.id + '">'+ suggestion.title +'</a> </span> <span>'+ suggestion.created_at_human +' &bull; '+ suggestion.area.name +'</span>'
				}
			},
			displayKey: 'title',
			empty: '<div class="aa-empty">No listings found</div>'
		})
	}

	return autocomplete(selector, {}, sources)
}