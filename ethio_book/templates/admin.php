<?php header("Access-Control-Allow-Origin: *"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="<?php echo BASE_URI . '/templates/css/custome_2.css'; ?>" rel="stylesheet">
    <link href="<?php echo BASE_URI . '/templates/css/style.css'; ?>" rel="stylesheet">
    <link href="<?php echo BASE_URI . '/templates/css/bootstrap.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo BASE_URI . '/templates/css/custom.css'; ?>" rel="stylesheet">
    <link href="<?php echo BASE_URI . '/templates/css/fontawesome-free-5.12.0-web/css/all.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo BASE_URI . '/templates/css/fontawesome-free-5.12.0-web/css/fontawesome.min.css'; ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URI . '/templates/css/detail_book_style.css'; ?>">
    <script src="<?php echo BASE_URI . '/templates/js/jquery-3.4.1.min.js'; ?>"></script>

    <style>
        .nav_t {
            font-size: 1rem;
        }

        a:hover {
            text-decoration: none;
        }

        .me_sending {
            margin: .2rem;
            position: relative;
            left: 180px;
            border: 1px solid rgb(205, 219, 219);
            border-radius: 4px;
        }

        .income_m {
            margin: .2rem;
            border: 1px solid rgb(205, 219, 219);
        }
    </style>
</head>

<body>
    <!-- Nav bar   -->

    <div id="nav-bar">
        <nav class="main-nav-bar">
            <a href="index.php">
                <p class="logo">
                    <span id="text-logo"><strong style="font-size:1.5rem;"><span style="color: #3AFFC3; ">ET</span>HIO<span style="color: #3AFFC3;"></span> BOOKS</strong></span>
                </p>
            </a>
            <div class="search_wrapper">
                <div id="main-search">
                    <!--                  <i class="fa fa-angle-down"></i>-->
                    <select id="header_search_catg">
                        <option value="" selected disabled>categories</option>
                        <option value="art_and_philosophy"> Arts and Philosophy</option>
                        <option value="biographies_and_memories">Biographies & Memories </p>
                        <option value="buisness_and_money"> Buisness & Money </option>
                        <option value="calendar">Calendar</option>
                        <option value="children_books"> Children's Books </option>
                        <option value="christian_book_and_bibles"> Christian Books & Bibles </option>
                        <option value="comics_and_graphicnovels">Comics & Graphic Novels </option>
                        <option value="computer_and_technology">Computer & Technology</option>
                        <option value="Cookbooks, Food & Wine">Cookbooks, Food & Wine</option>
                        <option value="history"> History</option>
                        <option value="law"> Law </option>
                        <option value="literature_and_fiction">Literature & Fiction</option>
                        <option value="medical_and_book">Medical Books</option>
                        <option value="romance">Romance </option>
                        <option value="science_and_math">Science & Math</option>
                        <!--           <option value="test">Test preparation</option>-->
                    </select>
                    <input type="search" id="search_books" placeholder="search">
                    <span class="yellow"></span>
                </div>
            </div>

            <p class="cart">
                <a href="cart.php">
                    <i class="fa fa-cart-plus">
                        <span class="item-quantity">
                            <?php if (isset($_SESSION['total_qty'])) {
                                echo $_SESSION['total_qty'];
                            } else {
                                echo 0;
                            } ?>
                        </span>
                    </i>
                </a>
            </p>

        </nav>

        <div class="nav-bar">
            <ul>
                <li>
                    <?php if (isset($_SESSION['logged_in'])) : ?>
                        <a style="color: white;" class="nav_t">Hello <span style="font-style: italic;"><?php echo $_SESSION['user_name']; ?></span>&nbsp;&nbsp;&nbsp;</a>
                        <a href="logout.php" class="nav_t">Logout</a>
                    <?php else : ?>
                        <a href="login.php" class="nav_t">Log-In</a>
                        <a href="signup.php" class="nav_t">Sign Up</a>
                    <?php endif; ?>

                </li>

                <li>
                    <?php if (isset($_SESSION['is_seller'])) : ?>
                        <a href="dashboard.php" class="nav_t">DashBoard</a> &nbsp;&nbsp;&nbsp;
                        <a href="sell.php" class="nav_t">Sell</a>
                    <?php elseif (isset($_SESSION['is_admin']) && !empty($_SESSION['is_admin']) && $_SESSION['is_admin'] == 't') : ?>
                        <a class="nav_t" href="admin.php">Admin</a>&nbsp;&nbsp;
                        <a class="nav_t" href="dashboard.php">DashBoard</a>&nbsp;&nbsp;
                        <a class="nav_t" href="sell.php">Sell</a>
                    <?php else : ?>
                        <a class="nav_t" href="seller_login.php">Seller Login | </a>
                        <a class="nav_t" href="seller_form.php">SignUp</a>
                    <?php endif; ?>
                </li>

                <li>
                    <a href="#" class="nav_t">New Releases</a>
                </li>
                <li>
                    <a href="#" class="nav_t"> Customer Service</a>
                </li>
                <li>
                    <?php if (isset($_SESSION['is_author']) && ($_SESSION['is_author'] == 1)) : ?>
                        <a href="authors.php?un=<?php echo $_SESSION['user_name']; ?>" class="nav_t">Author Profile</a>
                    <?php else : ?>
                        <a href="author_signup.php" class="nav_t"> Author Signup</a>
                    <?php endif; ?>

                </li>
                <li>
                    <a href="#" class="nav_t">Contact</a>
                </li>
            </ul>
        </div>
    </div>


    <?php if (isset($_SESSION['is_admin'])) : ?>
        <div class="admin_container">
            <div class="admin_header">
                <div id="admin_h" class="mb-5" style="
                display:grid;
                grid-template-columns:repeat(3,1fr);
                grid-gap:1rem;
                margin-left:7%;
                margin-right:7%;
                ">
                    <li class="btn btn-outline-dark" id="regular_customer">Regular Customer</li>
                    <li class="btn btn-outline-dark" id="seller_customer">Seller</li>
                    <li class="btn btn-outline-dark" id="admin_customer">Admin</li>
                    <li class="btn btn-outline-dark" id="all_books">Books</li>
                    <li class="btn btn-outline-dark" id="all_books">Sales</li>
                    <li class="btn btn-outline-dark" id="products">Products</li>
                    <li class="btn btn-outline-dark" id="admin_add"><a href="sell.php">
                            <a href="AdminControl.php"></a>
                            Add</a></li>
                </div>
            </div>
        </div>
    <?php else : ?>
        <h1>You are unauthorized to access this page.Get the F**k Out.</h1>
    <?php endif; ?>
    <section id="not_side_bar">
        <div class="graphs ml-5" style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 10px;">
            <div id="wrapper"></div>
            <div id="wrapper2"></div>
        </div>
        <div style="height: 900px;"></div>
    </section>
    <footer class="footer">
        <div class="footer-wrapper">
            <h4>Back to top</h4>
            <div>
                <div class="footer-divider">
                    <div>
                        <h5>About us</h5>
                        <p>Who is Genesis</p>
                        <p>Investors Relationship</p>
                        <p>Careers</p>
                        <p>Careers</p>
                    </div>
                    <div>
                        <h5>Make money with us</h5>
                        <p>Sell on Genesis</p>
                        <p>Self Publish with us</p>
                        <p>Advertise on Genesis</p>
                        <p>Careers</p>
                    </div>
                </div>
                <p class="copyright cp">&copy;copy 2020 - 2400 genesis.com Inc or Affliates</p>
            </div>
        </div>
    </footer>
    <script src="<?php echo BASE_URI . 'templates/js/d3.min.js'; ?>"></script>
    <script>
        const width = 400
        const barPadding = 1
        const dataset = JSON.parse('<?php echo $data_1; ?>')
        dataset.forEach(element => {
            element['rating'] = parseInt(element['rating'])
            element['sold'] = parseInt(element['sold'])
        });
        console.table(dataset[0]);
        const xAccessor = d => d.rating
        let dimensions = {
            width: width,
            height: width * 0.9,
            margin: {
                top: 30,
                right: 10,
                bottom: 50,
                left: 50,
            },
        }
        dimensions.boundedWidth = dimensions.width - dimensions.margin.left - dimensions.margin.right
        dimensions.boundedHeight = dimensions.height - dimensions.margin.top - dimensions.margin.bottom

        function drawBar() {
            // const soldAccessor = d => d.sold
            const yAccessor = d => d.length
            const wrapper = d3.select("#wrapper")
                .append("svg")
                .attr("width", dimensions.width)
                .attr("height", dimensions.height)
            const bounds = wrapper.append("g")
                .style("transform", `translate(${dimensions.margin.left}px,
                                               ${dimensions.margin.top}px)`)
            const xScale = d3.scaleLinear()
                .domain(d3.extent(dataset, xAccessor))
                .range([0, dimensions.boundedWidth])
                .nice()
            const binsGenerator = d3.histogram()
                .domain(xScale.domain())
                .value(xAccessor)
                .thresholds(6)
            const bins = binsGenerator(dataset)
            const yScale = d3.scaleLinear()
                .domain([0, d3.max(bins, yAccessor)])
                .range([dimensions.boundedHeight, 0])
            const binsGroup = bounds.append("g")
            const binGroups = binsGroup.selectAll("g")
                .data(bins)
                .enter()
                .append("g")
            const barRects = binGroups.append("rect")
                .attr("x", d => xScale(d.x0) + barPadding / 2)
                .attr("y", d => yScale(yAccessor(d)))
                .attr("width", d => d3.max([
                    0, xScale(d.x1) - xScale(d.x0) - barPadding
                ]))
                .attr("height", d => dimensions.boundedHeight - yScale(yAccessor(d)))
                .attr("fill", "cornflowerblue")
            const barText = binGroups.filter(yAccessor)
                .append("text")
                .attr("x", d => xScale(d.x0) + (xScale(d.x1) - xScale(d.x0)) / 2)
                .attr("y", d => yScale(yAccessor(d) + 0.1))
                .text(yAccessor)
                .attr("fill", "darkgrey")
                .style("text-anchor", "middle")
                .style("font-family", "sans-serif")
                .style("font-size", "12px")
            const mean = d3.mean(dataset, xAccessor)
            const meanLine = bounds.append("line")
                .attr("x1", xScale(mean))
                .attr("x2", xScale(mean))
                .attr("y1", -15)
                .attr("y2", dimensions.boundedHeight)
                .attr("stroke", "maroon")
                .attr("stroke-dasharray", "2px 4px")
            const meanLabel = bounds.append("text")
                .attr("x", xScale(mean))
                .attr("y", -22)
                .text("mean")
                .attr("fill", "maroon")
                .style("font-size", "12px")
                .style("text-anchor", "middle")
            const xAxisGenerator = d3.axisBottom().scale(xScale)
            const xAxis = bounds.append("g")
                .call(xAxisGenerator)
                .style("transform", `translateY(${dimensions.boundedHeight}px)`)
            const xAxisLabel = xAxis.append("text")
                .attr("x", dimensions.boundedHeight / 2)
                .attr("y", dimensions.margin.bottom - 10)
                .attr("fill", "black")
                .style("font-size", "1.2rem")
                .text("Rating")
        }
        drawBar();

        function drawBar3() {

            const wrapper3 = d3.select("#wrapper2")
                .append("svg")
                .attr("width", dimensions.width)
                .attr("height", dimensions.height)
            const bounds = wrapper3.append("g")
                .style("transform", `translate(${dimensions.margin.left}px,
                                           ${dimensions.margin.top}px)`)
            const xValue = d => d.sold
            const yValue = d => d.language
            const yScale = d3.scaleBand()
                .domain(dataset.map(yValue))
                .range([0, dimensions.boundedHeight])
                .padding(0.2)
            const xScale = d3.scaleLinear()
                .domain([0, d3.max(dataset, xValue)])
                .range([0, dimensions.boundedWidth])
            const render = data => {
                const xAxis = bounds.append("g").call(d3.axisLeft(yScale))
                xAxis.append("text")
                    .attr("y", dimensions.boundedHeight + 45)
                    .attr("x", dimensions.boundedWidth / 2)
                    .attr("fill", "black")
                    .text("Sold")
                    .style("font-size", "1.2rem")
                const yAxis = bounds.append("g").call(d3.axisBottom(xScale))
                    .attr("transform", `translate(0, ${dimensions.boundedHeight})`)
                bounds.selectAll('rect').data(dataset).enter()
                    .append('rect')
                    .attr('y', d => yScale(yValue(d)))
                    .attr("width", d => xScale(xValue(d)))
                    .attr("height", yScale.bandwidth())
                    .attr("fill", "cornflowerblue")
            }
            render(dataset)
        }
        drawBar3()

        function drawBar2() {
            // const yAcessor = d => sold
            // const wrapper2 = d3.select("#wrapper2")
            //     .append("svg")
            //     .attr("width", dimensions.width)
            //     .attr("height", dimensions.height)
            // const bounds = wrapper.append("g")
            //     .style("transform", `translate(${dimensions.margin.left}px,${dimensions.margin.top}px)`)
            // const xScale = d3.scaleLinear()
            //     .domain(d3.extent(dataset, yAccessor))
            //     .range([0, dimensions.boundedWidth])
            //     .nice()
            // const yScale = d3.scaleLinear()
            //     .domain([0, d3.max(bins, y)])
            // const
            // const binsGenerator = d3.histogram()
            //     .domain(xScale.domain())
            //     .value(yAcessor)
            //     .thresholds(8)
            // const bins = binsGenerator(dataset)
            // const
        }
    </script>

    <script>
        const xhr = new XMLHttpRequest();
        document.getElementById("search_books").addEventListener('input', (e) => {

            let select = document.getElementById("header_search_catg");
            let catg = select.value
            let search_word = e.target.value;
            xhr.open("GET", `<?php echo BASE_URI; ?>ajax_handler.php?q=${search_word}&ctg=${catg}`)
            xhr.onload = function() {
                let response = xhr.response
                response = JSON.parse(response)
                if ((e.target.value) === '') {
                    book_card_container.innerHTML = "";
                }
                const book_card_container = document.createElement("div")
                if (response) {
                    let not_side_bar = document.getElementById("not_side_bar")
                    not_side_bar.className = "not-side-bar col-md-10"
                    not_side_bar.textContent = ""
                    not_side_bar.appendChild(book_card_container)
                    book_card_container.className = "book_card_container"
                    let content_div = "";
                    console.log(response);
                    response.forEach(element => {
                        content_div += `<div class="single-book">
                        <a href="#" data-id="1">
                            <div class="card-b">
                                <img src="<?php echo BASE_URI; ?>images/book/${element['book_image']}">
                                <p><strong>${element['book_title']}</strong></p>
                                <p>${element['author']}</p>
                                <p class="type item-light">Package Cover</p>
                                <p class="price item-light">$54.99</p>
                                <p class="ml-auto quantity items-left">(43)</p>
                                <a href="mybook.php?t=${element['book_title']}&id=${element['id']}" class="btn btn-outline-success">View Book</a>
                            </div>
                        </a>
                    </div>`
                    });
                    book_card_container.innerHTML = content_div
                }
            }
            xhr.send();
        })
    </script>
</body>

</html>