
<?php
class RegionView
{
    public function render($data)
    {
        $no = 1;
        $dataRegion = null;
        foreach ($data as $val) {
            list($region_id, $region_name) = $val;

            $dataRegion .=
                "<tr>
                        <td>" . $no++ . "</td>
                        <td>" . $region_name . "</td>
                        <td>
                        <a href='index.php?id_hapus=" . $region_id . "' class='btn btn-danger''>Hapus</a>
                                </td>
                      </tr>
                      ";
        }

        $tpl = new Template("templates/region.html");
        $tpl->replace("DATA_TABEL", $dataRegion);
        $tpl->write();
    }
}
