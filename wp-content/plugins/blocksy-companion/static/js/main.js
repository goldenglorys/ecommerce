import ctEvents from 'ct-events'
import { onDocumentLoaded } from 'blocksy-frontend'
import { mountAccount } from './frontend/account'
import { mountStickyHeader } from './frontend/sticky'

onDocumentLoaded(() => {
	mountAccount()
	mountStickyHeader()
})

ctEvents.on('blocksy:frontend:init', () => {
	mountAccount()
	mountStickyHeader()
})
