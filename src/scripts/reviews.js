import EmblaCarousel from 'embla-carousel'
import { addPrevNextBtnsClickHandlers } from './EmblaCarouselArrowButtons'

export function applyReviewsEmbla(root) {
  const viewportNode = root.querySelector('[data-reviews-list]')
  const navNodes = root.querySelectorAll('[data-reviews-nav]') || []

  const emblaApi = EmblaCarousel(viewportNode, { loop: true, slidesToScroll: 'auto' })

  navNodes.forEach(el => {
    const prevBtnNode = el.querySelector('[data-reviews-prev]')
    const nextBtnNode = el.querySelector('[data-reviews-next]')
    if (prevBtnNode && nextBtnNode) {
      const removePrevNextBtnsClickHandlers = addPrevNextBtnsClickHandlers(
        emblaApi,
        prevBtnNode,
        nextBtnNode
      )
      emblaApi.on('destroy', removePrevNextBtnsClickHandlers)
    }
  })
}

export function initReviewsEmbla() {
  const nodes = Array.from(document.querySelectorAll('[data-reviews]'))
  nodes.forEach(applyReviewsEmbla)
}