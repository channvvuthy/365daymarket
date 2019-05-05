<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3>Follow Us</h3>
                    <ul class="list-unstyled">
                        <li><a href="">Facebook</a></li>
                        <li><a href="">Google Plus</a></li>
                    </ul>
                </div>
                <div class="col">
                    <h3>Customer Service</h3>
                    <ul class="list-unstyled">
                        <li><a href="" title="Contact Us">Contact Us</a></li>
                        <li><a href="">Membership</a></li>
                        <li><a href="">Promote Ad</a></li>
                        <li><a href="" title="Privacy Policy">Private Policy</a></li>
                    </ul>
                </div>
                <div class="col">
                    <h3>Useful Information</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Safety Tip</a></li>
                        <li><a href="https://www.khmer24.com/en/posting-rule.html">Ad Posting Rule</a></li>
                        <li><a href="https://www.khmer24.com/en/help.html">របៀបប្រើ</a></li>
                    </ul>
                </div>
                <div class="col">
                    <h3>Download khmer24 app for FREE</h3>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="{{asset('js/app.js')}}"></script>
<script>
    window.onload = function () {
        var parent = $(".parent");
        var parentHeight = parent.height();
        $(".child").css({"min-height": parentHeight + "px"})
    };
    $("body").on('mouseover', '.parent li', function (e) {
        var parent_id = $(this).attr('id');
        var child = $("body .none").css({"display": "none"});
        var child = $("body .parent_id_" + parent_id).css({"display": "block"});

    }).on('click','div.toggle-cat',function () {
        $('.main-nav').toggleClass('d-none');
        $('.child').toggleClass('d-none');
    });


</script>
</body>

</html>