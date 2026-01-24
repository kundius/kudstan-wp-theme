import './src/styles/fonts.css'
import 'normalize.css'
import './src/styles/main.css'
import './src/styles/icons.css'
import './src/styles/header.css'
import './src/styles/footer.css'
import './src/styles/modal.css'
import './src/styles/intro.css'
import './src/styles/services.css'
import './src/styles/reviews.css'
import './src/styles/news.css'
import './src/styles/contacts.css'
import './src/styles/offer.css'

import fslightbox from 'fslightbox'
import { Mask, MaskInput } from 'maska'

import { initStickyHeader } from './src/scripts/sticky-header'
import { initServices } from './src/scripts/services'
import { initReviewsEmbla } from './src/scripts/reviews'
import { initNewsEmbla } from './src/scripts/news'
import { initMobileMenu } from './src/scripts/mobile-menu'
import { initSlideshow } from './src/scripts/slideshow'
import { initCallbackButton } from './src/scripts/callback-button'

new MaskInput('[data-maska]')

initStickyHeader()
initServices()
initReviewsEmbla()
initNewsEmbla()
initMobileMenu()
initSlideshow()
initCallbackButton()