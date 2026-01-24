import MicroModal from 'micromodal'

export function applyCallbackButton(el) {
  el.addEventListener('click', (e) => {
    e.preventDefault()

    MicroModal.show('modal-callback', {
      awaitOpenAnimation: true,
      awaitCloseAnimation: true,
      closeTrigger: 'data-modal-close'
    })
  })
}

export function initCallbackButton() {
  const buttons = document.querySelectorAll('[data-callback-button]') || []

  Array.from(buttons).forEach(applyCallbackButton)

  const links = document.querySelectorAll('[href="#callback"]') || []

  Array.from(links).forEach(applyCallbackButton)
}
