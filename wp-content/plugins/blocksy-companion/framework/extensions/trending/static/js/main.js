import { onDocumentLoaded } from 'blocksy-frontend'
import ctEvents from 'ct-events'
import { mount } from './trending-block'

const initTrending = () => {
	Array.from(
		document.querySelectorAll('.ct-trending-block [data-page]')
	).map((el) => mount(el))
}

onDocumentLoaded(() => {
	initTrending()
})

ctEvents.on('blocksy:frontend:init', () => {
	initTrending()
})
