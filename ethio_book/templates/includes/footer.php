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
<script src="<?php echo BASE_URI . 'jquery-3.4.1.min.js'; ?>"></script>
<?php $script_name =  basename($_SERVER['SCRIPT_FILENAME']); ?>
<?php if ($script_name == "edit_book.php") : ?>
    <script src='<?php echo BASE_URI . 'templates/js/edit_book.js' ?>.'></script>
<?php elseif ($script_name == "cart.php") : ?>
    <script src='<?php echo BASE_URI . 'templates/js/cart.js' ?>.'></script>
<?php elseif ($script_name == "mybook.php") : ?>
    <script src='<?php echo BASE_URI . 'templates/js/mybook.js' ?>.'></script>;
    <script>
        let msgBox = $("#msg_box")
        let wsURI = "ws://localhost:9000/server.php" // uri for the ws server script
        websocket = new WebSocket(wsURI)

        websocket.onopen = ev => { // connection is open 
            console.log("Connection established")
        }
        // Message received from server
        websocket.onmessage = ev => {
            // decoding the incoming message
            let response = JSON.parse(ev.data)
            let res_type = response.type
            let user_message = response.message
            let user_name = response.name;
            // let user_color = response.color
            let now = new Date() // the current time and data
            now = now.toUTCString()
            if (user_name == '<?php echo $_SESSION['user_name']; ?>') {
                msgBox.append(`
                <div class='incoming_m'>
                   <p>${user_name} &nbsp;&nbsp;<span style="color:brown">${now}</span><br></p>
                   <p>${user_message}</p>
                </div>`);
            } else {
                msgBox.append(`
                <div class='me_sending'>
                    <p>${user_name}&nbsp;&nbsp;<span style="color:brown">${now}</span><br></p>
                    <p>${user_message}</p>
                </div>`)
            }
            // msgBox[0].scrollTop = msgBox[0].scrollHeight; //scroll message 
        }
        websocket.onerror = ev => {
            msgBox.append("<div class='me_sending'><p style='color:red'>Error on sending the message</p></div>")
        }
        websocket.onclose = ev => {
            console.log("Closed Srrots")
        }
        // when send button is clicked send message
        $('#give_review').click(function() {
            send_message()
        })
        $('#review_b').on("keydown", function(event) {
            if (event.which == 13) {
                send_message()
            }
        })

        function send_message() {
            // console.log("I am trying");
            let book_id = $("#book_hidden_id")
            let message_input = $('#review_b') // get user review
            let name_input = "<?php echo $_SESSION['user_name']; ?>"
            if (message_input.val() == "") {
                alert("Enter the review body Please!")
                return;
            }
            $.post("<?php echo BASE_URI; ?>ajax_handler.php", {
                    message: message_input.val(),
                    user_name: name_input,
                    book_id: book_id.val(),
                    user_id: '<?php echo $_SESSION['user_id']; ?>'
                },
                (data) => {
                    console.log(data)
                })
            //prepare json data
            let msg = {
                message: message_input.val(),
                name: name_input,
            };
            // convert and send data to server
            websocket.send(JSON.stringify(msg))
            // reseting the review input  
            message_input.val("")
        }
        let total_cost = document.getElementById("total_cost");
        let total_cost_value = 0;
        document.getElementById("new_book_qty").addEventListener('input', (e) => {
            let nbq_price = "<?php echo $book->new_book_price; ?>";
            total_cost.innerHTML = 0;
            total_cost_value = 0;
            if ((nbq_price === null) || (nbq_price === 0)) {
                total_cost_value = 0;
            } else {
                total_cost_value = parseFloat(nbq_price) * e.target.value;
            }
            total_cost.innerHTML = parseFloat(total_cost_value);
        });

        document.getElementById("old_book_qty").addEventListener('input', (e) => {
            let obq_price = "<?php echo $book->old_book_price; ?>";
            total_cost.innerHTML = 0;
            total_cost_value = 0;
            total_cost_value += parseFloat(obq_price) * e.target.value;
            total_cost.innerHTML = parseFloat(total_cost_value);
        });
        document.getElementById("e_book_qty_q").addEventListener('input', (e) => {
            total_cost.innerHTML = 0;
            total_cost_value = 0;
            let e_book_price = "<?php echo $book->e_book_price; ?>";
            total_cost_value += parseFloat(e_book_price) * e.target.value;
            total_cost.innerHTML = parseFloat(total_cost_value);
        })
    </script>
<?php endif; ?>



<?php if ($script_name == "dashboard.php") : ?>
    <script>
        let book_id = null;
        document.getElementById("dashboard_obp").addEventListener('input', e => {
            let obp = e.target.value
            book_id = e.target.dataset.id
            xhr.open("GET", `<?php echo BASE_URI; ?>ajax_handler.php?obp=${obp}&bid=${book_id}&t=obp`);
            // xhr.open("POST", `<?php echo BASE_URI; ?>ajax_handler.php`);
            xhr.onload = function() {
                const response = xhr.response;
                e.target.value = response.text;
            }
            xhr.send();
        })
        document.getElementById("dashboard_nbp").addEventListener('input', e => {
            let nbp = e.target.value
            book_id = e.target.dataset.id
            xhr.open("GET", `<?php echo BASE_URI; ?>ajax_handler.php?nbp=${ebp}&bid=${book_id}&t=nbp`);
            // xhr.open("POST", `<?php echo BASE_URI; ?>ajax_handler.php`);
            xhr.onload = function() {
                const response = xhr.response;
                e.target.value = response.text;
            }
            xhr.send();
        })
        document.getElementById("dashboard_ebp").addEventListener('input', e => {
            let ebp = e.target.value
            book_id = e.target.dataset.id
            xhr.open("GET", `<?php echo BASE_URI; ?>ajax_handler.php?ebp=${ebp}&bid=${book_id}&t=ebp`);
            // xhr.open("POST", `<?php echo BASE_URI; ?>ajax_handler.php`);
            xhr.onload = function() {
                const response = xhr.response;
                e.target.value = response.text;
            }
            xhr.send();
        })
    </script>
<?php endif; ?>
<?php if ($script_name == "admin.php") : ?>
    <script>
        document.getElementById("regular_customer").addEventListener('click', (e) => {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", `<?php echo BASE_URI; ?>ajax_handler.php`);

            xhr.onload = function() {
                const serverResponse = xhr.response;
                console.log(serverResponse);
            }
            let all_sellers = 'true';
            xhr.send(all_sellers);
        })
    </script>
<?php endif; ?>
<script>
    // let my_fa = ['spray-can', 'tv', 'archway', 'bus', 'diagnoses', 'hiking', 'landmark', 'play-circle', 'book-open', 'laptop'];
    // let my_fa_decription = ["Beauty and personal Care", "Electronics", "Construction",
    //     "Automotive", "Women's Fashion", "Sport and Outdoor's", "Houses", "Movies-Music-CDs", "Books", "Laptops"
    // ]
    // let current_displayed = document.querySelectorAll("#cat_icon_wrapper .fa");
    // let cat_icon_wrapper_boss = document.getElementById("cat_icon_wrapper");
    // console.log(cat_icon_wrapper_boss.childNodes);
    // let cat_icon_wrapper = document.querySelectorAll("#cat_icon_wrapper .fa"); <
    // !--
    // let cat_icon_wrapper_boss = cat_icon_wrapper[4].parentNode.parentNode.parentNode;
    // -- >

    // let arrow_left = document.querySelector(".fa-arrow-right");
    // arrow_left.addEventListener("click", function(e) {
    //     -- >
    //     <
    //     !--console.log(fa_lists);
    //     -- >
    //     cat_icon_wrapper_boss.removeChild(cat_icon_wrapper[4]);
    //     cat_icon_wrapper_boss.removeChild(cat_icon_wrapper[5]);
    // }, false);

    let al = document.getElementById('alert_message');
    if (al) {
        setTimeout(function() {
            alert.remove();
        }, 2000);
    }

    // let script_name = ""
    // console.log(script_name); 
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
                not_side_bar.textContent = "";
                not_side_bar.appendChild(book_card_container)
                book_card_container.className = "book_card_container"
                let content_div;
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

    let to_be_deleted_book = document.getElementsByClassName('delete_book');
    to_be_deleted_book = Array.from(to_be_deleted_book);

    to_be_deleted_book.forEach(element => {
        element.addEventListener("click", (e) => {
            console.log("At least clicked");
            let approve_delete = document.getElementById("po");
            approve_delete.style.opacity = 100;

            let delete_no = document.getElementById("delete_no");
            delete_no.addEventListener("click", () => {
                approve_delete.style.opacity = 0;
            })

            let delete_yes = document.getElementById("delete_yes");
            delete_yes.addEventListener("click", () => {
                let book_id = e.target.dataset.id;
                // const xhr = new XMLHttpRequest();
                xhr.open("GET", `<?php echo BASE_URI; ?>delete_book.php?id=${book_id}`);
                xhr.responseType = "text";
                // xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                xhr.onload = function() {
                    const serverResponse = xhr.response;
                    if (serverResponse) {
                        let parent_element = e.target.parentNode.parentNode;
                        approve_delete.style.opacity = 0;
                        parent_element.remove();
                    }
                }
                xhr.send();
            })
        })
    });
</script>
<?php if ($script_name == 'authors.php') : ?>
    <script>
        let post_blog = document.getElementById("submit_blog")
        let blog_title = document.getElementById('blog_title')
        let blog_body = document.getElementById('blog_body')
        // let title = blog_title
        // let body = blog_body
        post_blog.addEventListener("click", (e) => {
            $.post("<?php echo BASE_URI; ?>ajax_handler.php", {
                    title: blog_title.value,
                    body: blog_body.value,
                    id: '<?php echo $_SESSION['user_id']; ?>'
                },
                (data) => {

                    blog_body.value = "";
                    blog_title.value = "";

                })
            // let xhr = new XMLHttpRequest();

            // xhr.open('POST', 'ajax_handler.php');
            // xhr.setRequestHeader('Content-Type', 'application/json')
            // xhr.onload = function() {
            //     const serverResponse = xhr.response;
            //     console.log(serverResponse)
            // }
            // xhr.send(JSON.stringify({
            //     t: title,
            //     b: body
            // }));
        })
        let yes = document.getElementById("yes")
        let no = document.getElementById('no')

        yes.addEventListener('click', (e) => {
            let id = e.target.dataset.id

            $.post("<?php echo BASE_URI; ?>ajax_handler.php", {
                    yes: 't',
                    id_no: id
                }),
                (data) => {
                    console.log("data")
                    console.log(id)
                    yes.innerHTML = data
                    // yes.disabled = true
                    // no.disabled = false
                }
        })

        no.addEventListener('click', (e) => {
            let id = e.target.dataset.id
            $.post("<?php echo BASE_URI; ?>ajax_handler.php", {
                    no: 't',
                    id_no: id
                }),
                (data) => {
                    console.log(data)
                    no.innerHTML = data
                    no.disabled = true
                    yes.disabled = false
                }
        })
    </script>
<?php endif; ?>
</body>

</html>