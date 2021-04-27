import $ from 'jquery'
import { Flexy, adjustContainerHeightFor } from 'flexy'
import { markImagesAsLoaded } from './lazy-load-helpers'
import ctEvents from 'ct-events'
import { getCurrentScreen } from '../frontend/helpers/current-screen'

export const mount = (sliderEl) => {
	// sliderEl = sliderEl.parentNode

	if (sliderEl.flexy) {
		return
	}

	markImagesAsLoaded(sliderEl.querySelector('.flexy-items'))
	markImagesAsLoaded(sliderEl.querySelector('.flexy-pills'))

	const inst = new Flexy(sliderEl.querySelector('.flexy-items'), {
		flexyAttributeEl: sliderEl,
		elementsThatDoNotStartDrag: ['.twentytwenty-handle'],
		adjustHeight: !!sliderEl.querySelector('.flexy-items').dataset.height,

		autoplay:
			Object.keys(sliderEl.dataset).indexOf('autoplay') > -1 &&
			parseInt(sliderEl.dataset.autoplay, 10)
				? sliderEl.dataset.autoplay
				: false,

		pillsContainerSelector: sliderEl.querySelector('.flexy-pills')
			.firstElementChild,
		leftArrow: sliderEl.querySelector('.flexy .flexy-arrow-prev'),
		rightArrow: sliderEl.querySelector('.flexy .flexy-arrow-next'),
		scaleRotateEffect: false,

		onDragStart: (e) => {
			Array.from(
				e.target.closest('.flexy-items').querySelectorAll('.zoomImg')
			).map((img) => {
				$(img).stop().fadeTo(120, 0)
			})
		},

		// viewport | container
		wrapAroundMode:
			sliderEl.dataset.wrap === 'viewport' ? 'viewport' : 'container',

		...(sliderEl.querySelector('.flexy-pills [data-flexy]')
			? {
					pillsFlexyInstance: sliderEl.querySelector(
						'.flexy-pills [data-flexy]'
					),
			  }
			: {}),

		/*
		...(sliderEl.nextElementSibling &&
		sliderEl.nextElementSibling.matches('.flexy-draggable-pills')
			? {
					pillsContainerSelector: sliderEl.nextElementSibling.querySelector(
						'.flexy-items'
					),

					pillsFlexyInstance: sliderEl.nextElementSibling,
			  }
			: {}),
            */
	})

	sliderEl.flexy = inst
}

export const mountSimpleGallery = (sliderEl) => {
	if (sliderEl.flexy) {
		return
	}

	const inst = new Flexy(sliderEl, {
		elementsThatDoNotStartDrag: ['.twentytwenty-handle'],
		// viewport | container
		wrapAroundMode:
			sliderEl.dataset.wrap === 'viewport' ? 'viewport' : 'container',

		leftArrow: sliderEl.parentNode.querySelector('.flexy-arrow-prev'),
		rightArrow: sliderEl.parentNode.querySelector('.flexy-arrow-next'),
		hasDragAndDrop: false,

		...(sliderEl.closest('.thumbs-left') &&
		getCurrentScreen({ withTablet: true }) !== 'mobile'
			? {
					orientation: 'vertical',
			  }
			: {}),
	})

	sliderEl.flexy = inst
}

ctEvents.on('ct:flexy:update-height', () => {
	;[...document.querySelectorAll('.flexy-container')].map((el) => {
		if (!el.flexy) {
			return
		}

		adjustContainerHeightFor(el.flexy)
	})
})
