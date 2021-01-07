<html>

<head>
    <title>Contact</title>
</head>
<link rel="stylesheet" href="static/css/style.css">

<body>
    <div class="return-container">
        <form action="index.php">
            <input type="submit" value="Return to Home" class="btn-template return-btn">
        </form>
    </div>
    <div>
        <h1 style="text-align: center;">Contact Restaurant</h1>
    </div>
    <div class="container-payment">

        <div class="contact-form">
            <form action="#">
                <div class="col">
                    <label for="name">Name</label>
                    <input type="text" name="name" placeholder="Contact Name">
                </div>
                <div class="col">
                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="Contact Email">
                </div>
                <div class="col">
                    <label for="reason">Reason for contact</label>
                    <select name="reason">
                        <option value="issue">There was an issue with my order</option>
                        <option value="notreceived">I never got my order</option>
                        <option value="unhappy">I'm unsatisfied with my order</option>
                        <option value="other">Other (Please specify)</option>
                    </select>
                </div>
                <div class="col" style="margin-top: 20px;">
                    <label for="message">Please briefly provide details of your order experience</label>
                    <textarea name="message" id="" cols="90" rows="10"></textarea>
                </div>
                <div style="margin-top: 20px;">
                    <input type="submit" value="Help us serve you better!" class="btn">
                </div>
            </form>
        </div>
    </div>
    <div class="footer">
        <p>
            <a class="contact-us" href="contact.php">Contact Us</a>
            <span style="font-weight: bold; font-size: 30px; margin: 0 20px 0 20px">|</span>
            <a class="contact-us" href="about.php">About Us</a>
        </p>
        <address>1050 Peel Street, Montreal QC, Canada</address>
        <p>Colin's Restaurant Inc &copy;</p>
    </div>
</body>

</html>