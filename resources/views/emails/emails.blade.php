<?php
$dealsinfo = DB::table('brand_dealinfo_tbl')->where('id', '=', $deals_id)->first();
if ($dealsinfo):
    $dealsImg = $dealsinfo->banner_image;
    ?>
    <img src="http://54.191.10.107/deals4uwebadmin/public/images/productimages/<?php echo $dealsImg ?>">
    <?php
    echo '<p> <b>Title : </b>' . $dealstitle = $dealsinfo->title . '<br></p>';
    echo '<p> Keyword : </b>' . $dealskeyword = $dealsinfo->keyword . '<br></p>';
    if ($dealsinfo->mobile != '') {
        echo '<p><b> Mobile : </b>' . $mobile = $dealsinfo->mobile . '<br></p>';
    } else {
        echo '<p><b> Mobile : </b>' . $mobile = 'N/A' . '<br></p>';
    }
    if ($dealsinfo->input_date_status == 1):
        if ($dealsinfo->start_date != ''):
            $a = explode('-', $dealsinfo->start_date);
            echo '<p><b> Start Date : </b>' . $my_new_date = $a[2] . '/' . $a[1] . '/' . $a[0] . '<br></p>';
        else :
            echo '<p><b> Start Date : </b>' . $my_new_date = 'N/A' . '<br></p>';
        endif;
    else:
        echo '<p><b> Start Date : </b>' . $my_new_date = 'N/A' . '<br></p>';
    endif;
    $b = explode('-', $dealsinfo->end_date);
    echo '<p><b> End Date : </b>' . $my_new_date2 = $b[2] . '/' . $b[1] . '/' . $b[0] . '<br></p>';
    echo '<p><b> Details : </b>' . $dealsdetails = $dealsinfo->details . '</p>';
    echo '<p><b> Category : </b>';
    $category = DB::table('category')
            ->select(
                    'category.category_title'
            )
            ->join('address_details', 'category.id', '=', 'address_details.category_id')
            ->where('address_details.ref_deals_id', '=', $dealsinfo->id)
            ->get();
    $my_category = '';
    if (count($category) > 0):
        foreach ($category as $cat):
            echo $my_category = $cat->category_title . ',';
        endforeach;
    else:
        echo 'N/A';
    endif;
    echo '</p>';
    $dealsId = $dealsinfo->id;
    $dealsAddr = DB::table('brand_address_tbl')->where('ref_dealinfo_id', '=', $dealsId)->get();
    foreach ($dealsAddr as $value):
        echo '<p><b> Address : </b>' . $value->address . '</p>';
    endforeach;
endif;
echo '<p><b> Web Link : </b>' . $dealsurl = $dealsinfo->url . '<br></p>';
?>