import { Controller } from 'stimulus';
import 'owl.carousel2/dist/assets/owl.carousel.css';
import 'owl.carousel2/dist/assets/owl.theme.default.css';
import 'owl.carousel2';

/*
 * This is an example Stimulus controller!
 *
 * Any element with a data-controller="hello" attribute will cause
 * this controller to be executed. The name "hello" comes from the filename:
 * hello_controller.js -> "hello"
 *
 * Delete this file or adapt it for your use!
 */
export default class extends Controller {
    connect() {
        $(this.element).owlCarousel({
            nav: false,
            autoplay: true,
            autoplayTimeout: 7000,
            autoplayHoverPause: true,
                responsive: {
                0: {
                    items: 1,
                    dots: true,
                },
                600: {
                    items: 1,
                    dots: true,
                },
                1000: {
                    items: 1,
                    dots: true,
                }
            }
        });
    }
}
