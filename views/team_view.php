
<?php
class TeamView
{
    public function render($data)
    {
        $no = 1;
        $dataTeam = null;
        foreach ($data as $val) {
            list($team_id, $team_name) = $val;

            $dataTeam .=
                "<tr>
                        <td>" . $no++ . "</td>
                        <td>" . $team_name . "</td>
                        <td>
                        <a href='index.php?id_hapus=" . $team_id . "' class='btn btn-danger''>Hapus</a>
                                </td>
                      </tr>
                      ";
        }

        $tpl = new Template("templates/team.html");
        $tpl->replace("DATA_TABEL", $dataTeam);
        $tpl->write();
    }
}
