
<?php
class MembersView
{
    public function render($data)
    {
        $no = 1;
        $dataMember = null;
        foreach ($data as $val) {
            list($id, $name, $email, $phone) = $val;

            $dataMember .=
                "<tr>
                        <td>" . $no++ . "</td>
                        <td>" . $name . "</td>
                        <td>" . $email . "</td>
                        <td>" . $phone . "</td>
                        <td>
                        <a href='index.php?id_edit=" . $id .  "' class='btn btn-warning''>Edit</a>
                        <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
                                </td>
                      </tr>
                      ";
        }

        $tpl = new Template("templates/index.html");
        $tpl->replace("DATA_TABEL", $dataMember);
        $tpl->write();
    }

    public function renderEditForm($memberData)
    {
        $id = $memberData['id'];
        $name = $memberData['name'];
        $email = $memberData['email'];
        $phone = $memberData['phone'];

        $tpl = new Template("templates/edit.html");
        $tpl->replace("ID", $id);
        $tpl->replace("NAME", $name);
        $tpl->replace("EMAIL", $email);
        $tpl->replace("PHONE", $phone);
        $tpl->write();
    }

    public function renderAddForm()
    {
        $tpl = new Template("templates/add.html");
        $tpl->write();
    }
}
