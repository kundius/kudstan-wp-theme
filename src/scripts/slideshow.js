import EmblaCarousel from 'embla-carousel'
import { addPrevNextBtnsClickHandlers } from './EmblaCarouselArrowButtons'

export function applySlideshow(viewportNode) {
  const navNodes = viewportNode.querySelectorAll('[data-slideshow-nav]') || []

  const emblaApi = EmblaCarousel(viewportNode, { loop: true, slidesToScroll: 'auto' })

  navNodes.forEach(el => {
    const prevBtnNode = el.querySelector('[data-slideshow-prev]')
    const nextBtnNode = el.querySelector('[data-slideshow-next]')
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

export function initSlideshow() {
  const nodes = Array.from(document.querySelectorAll('[data-slideshow]'))
  nodes.forEach(applySlideshow)
}