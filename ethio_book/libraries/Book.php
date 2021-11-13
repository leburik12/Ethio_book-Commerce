<?php
class Book
{
    private $dbh;

    public function __construct()
    {
        $this->dbh = new Database;
    }

    public function book_register($data)
    {
        $this->dbh->query("INSERT INTO book (book_title, book_category, page, new_book_price, old_book_price,new_book_qty,old_book_qty,seller_id, author,description, book_image,coupon,bs,e_book_price, e_book_qty,language, file_name, format,tag)
                       VALUES (:book_title, :book_category, :page, :new_book_price, :old_book_price, :new_book_qty, :old_book_qty, :seller_id, :author,:description, :book_image, :coupon, :bs, :e_book_price, :e_book_qty,:language,:file_name,:format,:tag)");
        // bind values
        $this->dbh->bind(":book_title", $data['book_title']);
        $this->dbh->bind(":book_category", $data['book_catg']);
        $this->dbh->bind(":page", $data['book_page']);
        $this->dbh->bind(":new_book_price", $data['new_book_price']);
        $this->dbh->bind(":old_book_price", $data['old_book_price']);
        $this->dbh->bind(":new_book_qty", $data['new_book_qty']);
        $this->dbh->bind(":old_book_qty", $data['old_book_qty']);
        $this->dbh->bind(":seller_id", $data['seller_id']);
        $this->dbh->bind(":author", $data['book_author']);
        $this->dbh->bind(":description", $data['book_des']);
        $this->dbh->bind(":book_image", $data['book_image']);
        $this->dbh->bind(":coupon", $data['coupon']);
        $this->dbh->bind(":bs", $data['bs']);
        $this->dbh->bind(":language", $data['language']);
        $this->dbh->bind(":e_book_price", $data['e_book_price']);
        $this->dbh->bind(":e_book_qty", $data['e_book_qty']);
        $this->dbh->bind(":file_name", $data['book_file_name']);
        $this->dbh->bind(":format", $data['format']);
        $this->dbh->bind(":tag", $data['premium']);
        return $this->dbh->execute() ?  true :  false;
    }

    public function book_image_register($image_name, $book_id, $user_id)
    {
        $this->dbh->query("INSERT INTO book_image (image_title, book_id, user_id) VALUES (:image_title, :book_id, :user_id)");
        // bind values
        $this->dbh->bind(":image_title", $image_name);
        $this->dbh->bind(":book_id", $book_id);
        $this->dbh->bind(":user_id", $user_id);

        return $this->dbh->execute() ?  true :  false;
    }

    public function getlastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

    public function image_validator($place)
    {
        $allowed_extensions = array('png', 'jpg', 'gif', 'jpeg');
        $temp = explode(".", $_FILES["book_profile"]['name']);
        $extension = end($temp);

        if (($_FILES["book_profile"]['type'] == "image/gif")
            || ($_FILES["book_profile"]['type'] == "image/jpeg")
            || ($_FILES["book_profile"]['type'] == "image/png")
            || ($_FILES["book_profile"]['type'] == "image/jpg")
            && in_array($extension, $allowed_extensions)
        ) {
            if ($_FILES["book_profile"]['error'] > 0) {
                redirect('sell.php', $_FILES["book_profile"]['error'], 'error');
            } else {
                move_uploaded_file(
                    $_FILES["book_profile"]['tmp_name'],
                    "images/$place/" . $_FILES["book_profile"]['name']
                );
                return true;
            }
        } else {
            return false;
        }
    }

    public function book_file_validator()
    {
        $allowed_extensions = array('pdf', 'ebup', 'mobi');
        $temp = explode(".", $_FILES['book_file']['name']);
        $extension = end($temp);

        if (($_FILES['book_file']['type'] == "application/epub")
            || ($_FILES['book_file']['type'] == "application/pdf")
        ) {
            if ($_FILES['book_file']['error'] > 0) {
                redirect('sell.php', $_FILES['book_file']['error'], 'error');
            } else {
                move_uploaded_file(
                    $_FILES['book_file']['tmp_name'],
                    'book_file/books/' . $_FILES['book_file']['name']
                );
                return true;
            }
        } else {
            return false;
        }
    }

    public function single_book($book_id)
    {
        $this->dbh->query("SELECT * FROM book WHERE id=:id");

        $this->dbh->bind(":id", $book_id);

        $row = $this->dbh->single();

        if ($this->dbh->rowCount() > 0) {
            return $row;
        } else {
            return '';
        }
    }

    public function edit_book($data)
    {
        $this->dbh->query("UPDATE book SET book_category=:book_cat,
                                           book_title=:book_title,
                                           page=:page,
                                           new_book_price=:new_book_price,
                                           old_book_price=:old_book_price,
                                           new_book_qty=:new_book_qty,
                                           old_book_qty=:old_book_qty,
                                           author=:author,
                                           description=:book_des,
                                           coupon=:coupon,
                                           discount=:discount,
                                           book_image=:book_image 
                                           WHERE id=:id");
        $this->dbh->bind(":book_cat", $data['book_catg']);
        $this->dbh->bind(":book_title", $data['book_title']);
        $this->dbh->bind(":page", $data['book_page']);
        $this->dbh->bind(":new_book_price", $data['new_book_price']);
        $this->dbh->bind(":old_book_price", $data['old_book_price']);
        $this->dbh->bind(":new_book_qty", $data['new_book_qty']);
        $this->dbh->bind(":old_book_qty", $data['old_book_qty']);
        $this->dbh->bind(":author", $data['author']);
        $this->dbh->bind(":book_des", $data['des']);
        $this->dbh->bind(":coupon", $data['coupon']);
        $this->dbh->bind(":discount", $data['discount']);
        $this->dbh->bind(":book_image", $data['book_image']);
        $this->dbh->bind(":id", $data['book_id']);

        return $this->dbh->execute() ? true : false;
    }

    public function seller_books($seller_id)
    {
        $this->dbh->query("SELECT * FROM book WHERE seller_id = :seller_id");
        $this->dbh->bind(":seller_id", $seller_id);

        $row = $this->dbh->resultset();

        if ($this->dbh->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function delete_book($book_id)
    {
        $this->dbh->query("DELETE FROM book WHERE id = :book_id");
        $this->dbh->bind(":book_id", $book_id);

        return $this->dbh->execute() ?  true :  false;
    }

    public function delete_book_image($book_id)
    {
        $this->dbh->query("UPDATE book SET book_image = :book_image WHERE id = :book_id");
        $this->dbh->bind(":book_image", "no_image.jpeg");
        $this->dbh->bind(":book_id",  $book_id);

        return $this->dbh->execute() ?  true :  false;
    }

    public function hot_new_releases()
    {
        $this->dbh->query("SELECT * FROM book  ORDER BY created DESC LIMIT 4");
        $row = $this->dbh->resultset();

        if ($this->dbh->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function best_sellers()
    {
        $this->dbh->query("SELECT * FROM book WHERE bs='t' LIMIT 4");
        $row = $this->dbh->resultset();

        if ($this->dbh->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function best_rated()
    {
        $this->dbh->query("SELECT * FROM book ORDER BY rating DESC limit 4");
        $row = $this->dbh->resultset();

        if ($this->dbh->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function book_rate($rt, $bid)
    {
        $this->dbh->query("SELECT person_rate FROM book WHERE id=:bid");
        $this->dbh->bind("bid", intval($bid));
        $row = $this->dbh->resultset();

        $row = (array)json_decode(json_encode($row), true);
        $person_r = $row[0]['person_rate'] + 1;

        $this->dbh->query("SELECT rating from book WHERE id=:bid");
        $this->dbh->bind("bid", intval($bid));
        $rate_result = $this->dbh->resultset();
        $rate_result = (array)json_decode(json_encode($rate_result), true);
        $rat = $rate_result[0]['rating'] + intval($rt);

        $this->dbh->query("SELECT rating_sum from book WHERE id=:bid");
        $this->dbh->bind("bid", intval($bid));
        $rate_sum = $this->dbh->resultset();
        $rate_sum = (array)json_decode(json_encode($rate_sum), true);
        $rate_sum = $rate_sum[0]['rating_sum'] + intval($rt);

        $rat = $rate_sum / $person_r;
        if ($rat > 0.0) {
            $this->dbh->query("UPDATE book SET rating=:rt,
                                               person_rate=:pr ,
                                                rating_sum=:rs
                                                WHERE id=:bid");
            $this->dbh->bind("rt", $rat);
            $this->dbh->bind("pr", $person_r);
            $this->dbh->bind("rs", $rate_sum);
            $this->dbh->bind("bid", $bid);

            if (!$this->dbh->execute()) {
                return "$rat";
            } else {
                return 'Can not rate this book';
            }
        }
    }

    public function change_obp($book_id, $price, $t)
    {
        $to_set = "";
        $pric = $price;
        $bid = $book_id;
        if ($t == 'obp') {
            $to_set_price = "old_book_price";
            $this->dbh->query("UPDATE book SET $to_set_price=:price WHERE id=:bid");
        } elseif ($t == 'nbp') {
            $to_set_price = "new_book_price";
            $this->dbh->query("UPDATE book SET $to_set_price=:price WHERE id=:bid");
        } elseif ($t == 'ebp') {
            $to_set_price = "e_book_price";
            $this->dbh->query("UPDATE book SET $to_set_price=:price WHERE id=:bid");
        }
        $this->dbh->bind("price", $price);
        $this->dbh->bind("bid", $bid);
        if ($this->dbh->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function search_bar($ctg, $query)
    {
        if ($ctg != "") {
            $category = $ctg;
            $quer = $query;

            $this->dbh->query("SELECT * FROM BOOK WHERE book_category=:ctg AND book_title REGEXP '$quer' LIMIT 10");
            $this->dbh->bind("ctg", $category);
            //select * from book where book_category = "literature_and_fiction" and book_title regexp "com";
            $result = $this->dbh->resultset();
            return $result;
        }
    }

    public function filter_by_category($category)
    {
        if (!empty($category)) {
            $ctg = $category;
            $this->dbh->query("SELECT * FROM book WHERE book_category=:ctg");
            $this->dbh->bind("ctg", $ctg);

            $result = $this->dbh->resultset();
            return $result;
        }
    }


    public function filter_by_condition($con)
    {
        if (!empty($con)) {
            if ($con == "new") {
                $this->dbh->query("SELECT * FROM book WHERE new_book_qty > 0");
            } else {
                $this->dbh->query("SELECT * FROM book WHERE old_book_qty > 0");
            }
            $result = $this->dbh->resultset();
            return $result;
        }
    }

    public function checkUserName($username)
    {
        $this->dbh->query("SELECT user_name FROM user WHERE user_name = :username");
        $this->dbh->bind("username", $username);
        $result = $this->dbh->resultset();

        if ($this->dbh->rowCount() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function registerAuthor($data)
    {
        $this->dbh->query("INSERT INTO author (name,email,phone_number,inside,user_name,image) 
                           VALUES (:name ,:email, :phone_number,:inside,:user_name,:pp)");
        $this->dbh->bind("name", $data['name']);
        $this->dbh->bind("email", $data['email']);
        $this->dbh->bind("phone_number", $data['phone_number']);
        $this->dbh->bind("inside", $data['inside']);
        $this->dbh->bind("user_name", $data['user_name']);
        $this->dbh->bind("pp", $data['pp']);
        $result = $this->dbh->execute();

        if (!$result) {
            $this->dbh->query("INSERT INTO user (user_name, email, phone_number, password, is_author) 
           VALUES (:user_name, :email, :phone_number, :password,:is_author)");

            $this->dbh->bind("user_name", $data['user_name']);
            $this->dbh->bind("password", $data['p1']);
            $this->dbh->bind("email", $data['email']);
            $this->dbh->bind("phone_number", $data['phone_number']);
            $this->dbh->bind("is_author", TRUE);

            if ($this->dbh->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function selectPremium()
    {
        $this->dbh->query("SELECT * FROM BOOK WHERE tag > 0");
        $result = $this->dbh->single();
        return $result;
    }
    public function customerOrderCreate($data, $cart)
    {
        $this->dbh->query("INSERT INTO customer_order (user_id,first_name, last_name, email,address,postal_code, phone_number, city,total_cash) 
                           VALUES (:user_id,:first_name, :last_name, :email, :address, :postal_code, :phone_number, :city,:total_cash)");
        $this->dbh->bind("user_id", $data['user_id']);
        $this->dbh->bind("first_name", $data['first_name']);
        $this->dbh->bind("last_name", $data['last_name']);
        $this->dbh->bind("email", $data['email']);
        $this->dbh->bind("address", $data['address']);
        $this->dbh->bind("postal_code", $data['postal_code']);
        $this->dbh->bind("phone_number", $data['phone_number']);
        $this->dbh->bind("city", $data['city']);
        $this->dbh->bind("total_cash", $data['total_cash']);

        $result = $this->dbh->execute();
        $last_insert_id = $this->dbh->lastInsertId();
        foreach ($cart as $c) {

            $book_id = $c['id'];
            $obq = $c['obq'];
            $nbq = $c['nbq'];
            $ebq = $c['ebq'];
            $sum = $obq + $nbq + $ebq;
            $this->dbh->query("INSERT INTO orders (order_id,book_id,nbq, ubq,ebq,total_price) 
                           VALUES (:order_id,:book_id,:nbq, :obq, :ebq, :total_price)");
            $this->dbh->bind("book_id", $book_id);
            $this->dbh->bind("nbq", $nbq);
            $this->dbh->bind("obq", $obq);
            $this->dbh->bind("ebq", $ebq);
            $this->dbh->bind("order_id", $last_insert_id);
            $this->dbh->bind("total_price", $data['total_cash']);
            $this->dbh->execute();

            $this->dbh->query("UPDATE book SET new_book_qty = new_book_qty - $nbq ,
                                                   old_book_qty = old_book_qty - $obq,
                                                   e_book_qty = e_book_qty - $ebq,
                                                   sold = sold + $sum 
                                                   WHERE id = $book_id");
            $this->dbh->execute();
            // $this->dbh->query("SELECT * FROM orders WHERE id=:id");
            // $this->dbh->bind("id", $last_insert_id);
            // $result = $this->dbh->resultset();

            // if ($this->dbh->rowCount() > 0) {
            //     return $result;
            // }

        }

        // select orders for invoice

        return false;
    }

    public function book_reviews($book_id)
    {
        $this->dbh->query("SELECT user_name , body , created FROM comment where book_id =:id");
        $this->dbh->bind(":id", $book_id);
        $result = $this->dbh->resultset();
        return $result;
    }

    public function saveComment($data)
    {
        $this->dbh->query("INSERT INTO comment (body, user_name, book_id, user_id) 
                           VALUES (:body, :user_name, :book_id, :user_id)");
        $this->dbh->bind(":body", $data['message']);
        $this->dbh->bind(":user_name", $data['user_name']);
        $this->dbh->bind(":book_id", $data['book_id']);
        $this->dbh->bind(":user_id", $data['user_id']);
        $result = $this->dbh->execute();
        return $result;
    }
}
    // $this->dbh->query("INSERT INTO book (rt) WHERE ")
