<!DOCTYPE html>
<html lang="en" style="width: 100%;height: 100%;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Personal Website</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets\css\Footer-Clean-icons.css">
    <link rel="stylesheet" href="file:C:\xampp\htdocs\Personal Website\assets\css\Footer-with-social-media-icons.css">
    <link rel="stylesheet" href="assets\css\Hero-Carousel-images.css">
    <link rel="stylesheet" href="assets\css\simple-footer.css">
</head>

<body
style="background: #d2c7d1;width: 100%;border-radius: 0px;margin: 0px;margin-bottom: 0px;opacity: 1;">
    <header class="text-start" style="background: rgb(44,62,80);margin: 0px 0px 0px 0px;height: 68px;"><a class="btn"
            href="index.html"
            style="background: var(--bs-purple);color: var(--bs-body-bg);text-decoration: none;font-size: 16px;margin: 12px 8px 12px 12px;"
            target="_parent">Home</a><a class="btn" href="portfolio.html"
            style="background: var(--bs-purple);color: var(--bs-body-bg);text-decoration: none;font-size: 16px;margin: 12px 8px 12px 12px;"
            target="_parent">Portfolio</a><a class="btn" href="contact.php"
            style="background: var(--bs-purple);color: var(--bs-body-bg);text-decoration: none;font-size: 16px;margin: 12px 8px 12px 12px;"
            target="_parent">Contact</a></header><!-- Start: Bold BS4 Three Column Portfolio Layout -->
    <div class="container" style="margin-top: 2%;">
        <div class="row">
            <div class="col-md-12">
                <h1 class="fs-1 fw-semibold text-center" style="height: 100%;padding-bottom: 0px;margin-bottom: 8px;">
                    Let's Connect</h1>
            </div>
        </div>
        <div class="row"
            style="margin-top: 1%;padding-right: 12%;padding-left: 12%;margin-left: -12px;margin-bottom: 0px;height: 180px;">
            <div class="col-md-4 text-center" style="height: 100%;margin-top: 12px;margin-bottom: 12px;"><button
                    class="btn btn-primary text-center" type="button" style="height: 100%;"
                    onclick="copyToClipboard()"><img class="d-block"
                        src="assets\img\icons8-whatsapp-100.png">Whatsapp</button>
            </div>
            <div class="col-md-4 text-center" style="height: 100%;margin-top: 12px;margin-bottom: 12px;"
                onclick="copyEmail()"><button class="btn btn-primary" type="button"
                    style="height: 100%;background: rgb(89, 49, 150);"><img class="d-block"
                        src="assets\img\icons8-gmail-100.png">Gmail</button></div>
            <div class="col-md-4 text-center" style="height: 100%;margin-top: 12px;margin-bottom: 12px;"><a class="btn"
                    href="https://www.linkedin.com/in/yves-king-chandra-0936a7220/"
                    style="background: rgb(89,49,150);color: var(--bs-body-bg);text-decoration: none;font-size: 16px;height: 100%;padding: 6px 12px;padding-top: 25px;padding-right: 12px;width: 126px;"
                    target="_blank"><img class="d-block" src="assets\img\icons8-linkedin-100.png">Linkedin</a></div>
            <div class="col">
                <!-- Start: Contact Form Basic -->
                <section class="py-4 py-xl-5">
                    <div class="container">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4" style="width: 741.406px;">
                                <div class="card mb-5">
                                    <div class="card-body p-sm-5">
                                        <form method="post">
                                            <!-- Start: Success Example -->
                                            <div class="mb-3" style="padding-bottom: 0px;">
                                                <input class="form-control" type="text" id="name-2" name="name"
                                                    placeholder="Name">
                                            </div>
                                            <!-- End: Success Example -->
                                            <!-- Start: Error Example -->
                                            <div class="mb-3">
                                                <input class="form-control" type="email" id="email-2" name="email"
                                                    placeholder="Email">
                                            </div>
                                            <!-- End: Error Example -->
                                            <div class="mb-3">
                                                <textarea class="form-control" id="message-2" name="message" rows="6"
                                                    placeholder="Message" style="height: 30px;"></textarea>
                                            </div>
                                            <div style="width: 35%;">
                                                <button class="btn btn-primary d-block w-100"
                                                    type="submit">Send</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End: Contact Form Basic -->
            </div>
            <script src="assets/bootstrap/js/bootstrap.min.js?h=79ff9637b74326c362fb6f7f5801a7ba"></script>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Establish a database connection
                $host = "139.255.11.84";
                $dbname = "forPHPPersonalWebsiteYves";
                $user = "student";
                $password = "isbmantap";

                $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ];
                try {
                    $pdo = new PDO($dsn, $user, $password, $options);
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                    die();
                }

                // Retrieve user input data from the form
                $name = isset($_POST['name']) ? $_POST['name'] : null;
                $email = isset($_POST['email']) ? $_POST['email'] : null;
                $message = isset($_POST['message']) ? $_POST['message'] : null;

                // Check if any of the fields are empty
                if (!$name || !$email || !$message) {
                    echo "<p>Please fill in all fields.</p>";
                } else {
                    // Prepare a SQL INSERT statement using placeholders
                    $sql = "INSERT INTO messages (nama, email, message) VALUES (:name, :email, :message)";
                    $stmt = $pdo->prepare($sql);

                    // Bind the user input data to the placeholders
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':message', $message);

                    // Execute the statement to insert the data into the database
                    if ($stmt->execute()) {
                        echo "<p> </p>";
                    } else {
                        echo "<p>Error sending message.</p>";
                    }
                }

                // Close the database connection
                $pdo = null;
            }
            ?>
            <script>
                var notlp = '081341494993'
                function copyToClipboard() {
                    navigator.clipboard.writeText(notlp);
                    alert("Whatsapp number has been copied to clipboard.");
                }
                var mygmail = 'yveskingchandra@gmail.com'
                function copyEmail() {
                    navigator.clipboard.writeText(mygmail);
                    alert("Email has been copied to clipboard.");
                }
            </script>
        </div>
    </div><!-- End: 2 Rows 1+3 Columns -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>