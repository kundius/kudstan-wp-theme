export function initReviewToggles() {
  const wrappers = Array.from(document.querySelectorAll('.review-card__content-wrapper'))
  wrappers.forEach(wrapper => {
    const toggle = wrapper.querySelector('.review-card__toggle')
    const full = wrapper.querySelector('.review-card__content-full')
    const preview = wrapper.querySelector('.review-card__content-preview')

    if (!toggle || !full || !preview) return

    function open() {
      wrapper.classList.add('is-expanded')
      toggle.setAttribute('aria-expanded', 'true')
      toggle.textContent = 'Свернуть'
      full.setAttribute('aria-hidden', 'false')
      // focus the full content so keyboard users can scroll
      full.focus()
      document.addEventListener('keydown', onKey)
    }

    function close() {
      wrapper.classList.remove('is-expanded')
      toggle.setAttribute('aria-expanded', 'false')
      toggle.textContent = 'Показать полностью'
      full.setAttribute('aria-hidden', 'true')
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
