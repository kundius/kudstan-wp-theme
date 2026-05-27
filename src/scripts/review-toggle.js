export function initReviewToggles() {
  const wrappers = Array.from(document.querySelectorAll('.review-card__content-wrapper'))
  wrappers.forEach(wrapper => {
    const openEl = wrapper.querySelector('.review-card__open')
    const full = wrapper.querySelector('.review-card__content-full')
    const preview = wrapper.querySelector('.review-card__content-preview')

    if (!open || !full || !preview) return

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
      // ensure visible when moved to body
      full.style.display = 'block'
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
      // hide after restoring to keep initial collapsed state
      full.style.display = 'none'
      portalParent.appendChild(full)
      portalParent = null
      if (repositionHandler) {
        window.removeEventListener('resize', repositionHandler)
        window.removeEventListener('scroll', repositionHandler, true)
        repositionHandler = null
      }
    }

    // attach to static close button inside full content (rendered by PHP)
    const closeBtn = full.querySelector('.review-card__close')
    if (closeBtn) closeBtn.addEventListener('click', () => close())

    function open() {
      wrapper.classList.add('is-expanded')
      // do NOT change the opener text/aria — opener remains an open-only control
      full.setAttribute('aria-hidden', 'false')
      placeInPortal()
      // focus the full content so keyboard users can scroll
      full.focus()
      document.addEventListener('keydown', onKey)
    }

    function close() {
      wrapper.classList.remove('is-expanded')
      full.setAttribute('aria-hidden', 'true')
      removeFromPortal()
      document.removeEventListener('keydown', onKey)
    }

    function onKey(e) {
      if (e.key === 'Escape') close()
    }

    // opener only opens, it does not toggle or change its label
    openEl.addEventListener('click', () => {
      open()
    })

    // close when clicking outside the full overlay (consider portal)
    document.addEventListener('click', (e) => {
      if (!wrapper.classList.contains('is-expanded')) return
      if (full.contains(e.target)) return
      if (wrapper.contains(e.target)) return
      close()
    })
  })
}
