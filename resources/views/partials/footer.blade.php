<footer class="footer-section">
    <div class="container mx-auto py-10 px-6">
        <div class="grid grid-cols-4 gap-10">
            <div class="footer-about">
                <h4>About</h4>
                <p>We are a UK based company that sells a range of pre-wash hair oil treatments to deliver you ultimate nourishment, glossing & quenching...</p>
                <a href="#" class="read-more">Read more about our brand...</a>
                <button class="follow-btn">Follow on shop</button>
            </div>
            <div class="footer-products">
                <h4>Our Products</h4>
                <ul>
                    <li><a href="#">Which syrup should I buy?</a></li>
                    <li><a href="#">The Syrups</a></li>
                    <li><a href="#">Best Sellers</a></li>
                    <li><a href="#">Search</a></li>
                    <li><a href="#">Customer Reviews</a></li>
                    <li><a href="#">Wholesale</a></li>
                </ul>
            </div>
            <div class="footer-help">
                <h4>Help & Info</h4>
                <ul>
                    <li><a href="#">Our Blog</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Service</a></li>
                    <li><a href="#">Shipping Policy</a></li>
                    <li><a href="#">Refund Policy</a></li>
                </ul>
            </div>
            <div class="footer-newsletter">
                <h4>Newsletter</h4>
                <form>
                    <input type="email" placeholder="E-mail">
                    <button type="submit">Subscribe</button>
                </form>
                <div class="social-icons">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-tiktok"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
.footer-section {
    background: #fff; /* Light background */
    color: #333; /* Dark text for good contrast */
    font-family: Arial, sans-serif; /* Stylish font */
}

.footer-section h4 {
    margin-bottom: 0.5rem;
    color: #222; /* Dark color for headings */
}

.footer-section p, .footer-section ul {
    margin-top: 0.5rem;
    line-height: 1.6; /* Spacing for readability */
}

.footer-section a {
    color: #0066cc; /* Blue links */
    text-decoration: none; /* No underline */
}

.footer-section a:hover {
    text-decoration: underline; /* Underline on hover */
}

.footer-section ul {
    list-style: none; /* No bullets */
    padding: 0; /* No padding */
}

.footer-section ul li a {
    display: block; /* Block level links */
    padding: 0.25rem 0; /* Padding for touch targets */
}

.footer-section .follow-btn {
    background-color: #4CAF50; /* Green background */
    color: white; /* White text */
    border: none; /* No border */
    padding: 0.5rem 1rem; /* Padding around text */
    margin-top: 1rem; /* Space above button */
    cursor: pointer; /* Pointer cursor on hover */
    border-radius: 0.25rem; /* Rounded corners */
}

.footer-section .social-icons a {
    display: inline-block; /* Side-by-side icons */
    margin-right: 0.5rem; /* Space between icons */
}

.footer-section .social-icons i {
    font-size: 1.5rem; /* Larger icons */
}

.footer-section input[type="email"] {
    padding: 0.5rem;
    margin-right: 0.5rem; /* Space between input and button */
    border: 1px solid #ccc; /* Light border */
    width: calc(100% - 110px); /* Full width minus button */
}

.footer-section button {
    padding: 0.5rem 1rem;
    background-color: #ff4500; /* Orange button */
    color: white;
    border: none;
    cursor: pointer;
}

@media (max-width: 768px) {
    .footer-section .grid {
        grid-template-columns: repeat(2, 1fr); /* 2 columns on small screens */
    }
}

</style>