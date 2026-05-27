export function initReviewToggles() {
  const wrappers = Array.from(document.querySelectorAll('.review-card__content-wrapper'))
  wrappers.forEach(wrapper => {
    const toggle = wrapper.querySelector('.review-card__toggle')
    const full = wrapper.querySelector('.review-card__content-full')
    const preview = wrapper.querySelector('.review-card__content-preview')

    if (!toggle || !full || !preview) return

    let portalParent = null
    let repositionHandler = null

    function placeInPortal() {
      // remember original parent so we can restore on close
      portalParent = full.parentNode
      // compute position relative to viewport
      const rect = wrapper.getBoundingClientRect()
      full.style.position = 'fixed'
      full.style.left = `${rect.left}px`
      full.style.top = `${rect.top}px`
      full.style.width = `${rect.width}px`
      full.classList.add('review-card__content-full--portal')
      document.body.appendChild(full)

      // update position on scroll/resize
      repositionHandler = () => {
        const r = wrapper.getBoundingClientRect()
        full.style.left = `${r.left}px`
        full.style.top = `${r.top}px`
        full.style.width = `${r.width}px`
      }
      window.addEventListener('resize', repositionHandler)
      window.addEventListener('scroll', repositionHandler, true)
    }

    function removeFromPortal() {
      if (!portalParent) return
      full.classList.remove('review-card__content-full--portal')
      // clear inline styles we set
      full.style.position = ''
      full.style.left = ''
      full.style.top = ''
      full.style.width = ''
      portalParent.appendChild(full)
      portalParent = null
      if (repositionHandler) {
        window.removeEventListener('resize', repositionHandler)
        window.removeEventListener('scroll', repositionHandler, true)
        repositionHandler = null
      }
    }

    function open() {
      wrapper.classList.add('is-expanded')
      toggle.setAttribute('aria-expanded', 'true')
      toggle.textContent = 'Свернуть'
      full.setAttribute('aria-hidden', 'false')
      placeInPortal()
      // focus the full content so keyboard users can scroll
      full.focus()
      document.addEventListener('keydown', onKey)
    }

    function close() {
      wrapper.classList.remove('is-expanded')
      toggle.setAttribute('aria-expanded', 'false')
      toggle.textContent = 'Показать полностью'
      full.setAttribute('aria-hidden', 'true')
      removeFromPortal()
      document.removeEventListener('keydown', onKey)
    }

    function onKey(e) {
      if (e.key === 'Escape') close()
    }

    toggle.addEventListener('click', () => {
      const expanded = toggle.getAttribute('aria-expanded') === 'true'
      if (expanded) close()
      else open()
    })

    // close when clicking outside the full overlay
    document.addEventListener('click', (e) => {
      if (!wrapper.classList.contains('is-expanded')) return
      if (wrapper.contains(e.target)) return
      close()
    })
  })
}
