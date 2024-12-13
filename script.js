// testimonials.js
const testimonials = document.querySelectorAll('.testimonial-slider blockquote');
let current = 0;

function showTestimonial(index) {
    testimonials.forEach((testimonial, i) => {
        testimonial.style.display = i === index ? 'block' : 'none';
    });
}

setInterval(() => {
    current = (current + 1) % testimonials.length;
    showTestimonial(current);
}, 3000);

showTestimonial(current);
