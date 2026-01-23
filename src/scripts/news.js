import EmblaCarousel from 'embla-carousel'
import { addPrevNextBtnsClickHandlers } from './EmblaCarouselArrowButtons'

export function applyNewsEmbla(root) {
  const viewportNode = root.querySelector('[data-news-list]')
  const navNodes = root.querySelectorAll('[data-news-nav]') || []

  const emblaApi = EmblaCarousel(viewportNode, { loop: true, slidesToScroll: 'auto' })

  navNodes.forEach(el => {
    const prevBtnNode = el.querySelector('[data-news-prev]')
    const nextBtnNode = el.querySelector('[data-news-next]')
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

export function initNewsEmbla() {
  const nodes = Array.from(document.querySelectorAll('[data-news]'))
  nodes.forEach(applyNewsEmbla)
}