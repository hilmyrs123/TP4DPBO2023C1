<?php

class Member extends DB
{
    function getMember()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['tname'];
        $email = $data['temail'];
        $phone = $data['tphone'];

        $query = "insert into members values ('', '$name', '$email', '$phone')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM members WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    //edit ini kaya get member by id
    function edit($id)
    {

        $query = "SELECT * FROM members WHERE id = '$id'";
        $result = $this->execute($query);
        $memberData = $this->getResult($result);
        return $memberData;
    }

    //update untuk query update
    function update($id, $name, $email, $phone)
    {
        $query = "UPDATE members SET name = '$name', email = '$email', phone = '$phone' WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
