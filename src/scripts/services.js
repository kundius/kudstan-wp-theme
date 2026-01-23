import EmblaCarousel from "embla-carousel"
import { addPrevNextBtnsClickHandlers } from "./EmblaCarouselArrowButtons"
import { addDotBtnsAndClickHandlers } from './EmblaCarouselDotButton'

function initForDesktop(servicesNode) {
  const prevNode = servicesNode.querySelector('[data-services-prev]')
  const nextNode = servicesNode.querySelector('[data-services-next]')
  const listNode = servicesNode.querySelector('[data-services-list]')
  const itemNodes = servicesNode.querySelectorAll('[data-services-item]')

  console.log(itemNodes)

  let activeIndex = Array.from(itemNodes).findIndex(el => el.classList.contains('active'))

  const prev = () => {
    itemNodes.forEach(el => el.classList.remove('active'))

    if (activeIndex === 0) {
      activeIndex = itemNodes.length - 1
    } else {
      activeIndex = activeIndex - 1
    }

    itemNodes[activeIndex].classList.add('active')
  }

  const next = () => {
    itemNodes.forEach(el => el.classList.remove('active'))

    if (activeIndex === itemNodes.length - 1) {
      activeIndex = 0
    } else {
      activeIndex = activeIndex + 1
    }

    itemNodes[activeIndex].classList.add('active')
  }

  const show = (index) => {
    if (index == activeIndex) return

    itemNodes.forEach(el => el.classList.remove('active'))

    activeIndex = index

    itemNodes[activeIndex].classList.add('active')
  }

  prevNode.addEventListener('click', prev)
  nextNode.addEventListener('click', next)
  itemNodes.forEach((itemNode, index) => itemNode.addEventListener('click', () => show(index)))
}

function initForMobile(servicesNode) {
  const viewportNode = servicesNode.querySelector('[data-services-list]')
  const navNodes = servicesNode.querySelectorAll('[data-services-nav]') || []
  const dotsNode = servicesNode.querySelector('[data-services-dots]')

  const emblaApi = EmblaCarousel(viewportNode, { loop: true, slidesToScroll: 'auto' })

  navNodes.forEach(el => {
    const prevBtnNode = el.querySelector('[data-services-prev]')
    const nextBtnNode = el.querySelector('[data-services-next]')
    if (prevBtnNode && nextBtnNode) {
      const removePrevNextBtnsClickHandlers = addPrevNextBtnsClickHandlers(
        emblaApi,
        prevBtnNode,
        nextBtnNode
      )
      emblaApi.on('destroy', removePrevNextBtnsClickHandlers)
    }
  })

  if (dotsNode) {
    const removeDotBtnsAndClickHandlers = addDotBtnsAndClickHandlers(
      emblaApi,
      dotsNode
    )
    emblaApi.on('destroy', removeDotBtnsAndClickHandlers)
  }
}

export function initServices() {
  const servicesNode = document.querySelector('[data-services]')

  if (servicesNode) {
    if (window.matchMedia('(min-width: 1024px)').matches) {
      initForDesktop(servicesNode)
    } else {
      initForMobile(servicesNode)
    }
  }
}
