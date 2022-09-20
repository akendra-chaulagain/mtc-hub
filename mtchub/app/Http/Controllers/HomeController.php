<?php

namespace App\Http\Controllers;

use App\Models\GlobalSetting;
use App\Models\NavigationItems;
use App\Models\NavigationVideoItems;
use App\Models\Navigation;
use Illuminate\Http\Request;
use App\Job;


class HomeController extends Controller
{
    public function index()
    {

        $menus = Navigation::query()->where('nav_category', 'Main')->where('page_type', '!=', 'Job')->where('page_type', '!=', 'Photo Gallery')->where('page_type', '!=', 'Notice')->where('parent_page_id', 0)->where('page_status', '1')->orderBy('position', 'ASC')->get();


        // home course section

        $home_product = Navigation::query()->where('nav_category', 'Main')->where('page_type', '=', 'Group')->where('page_status', '1')->orderBy('position', 'ASC')->first();
        $home_product_data =  $home_product->childs->take(5);

        // return $home_product_data->take(1);


        $home_best_product = Navigation::query()->where('nav_category', 'Main')->where('page_type', '=', 'Group')->where('page_status', '1')->orderBy('position', 'ASC')->first();
        $home_best_products = $home_best_product->first()->childs->first()->childs;

        // return $home_best_product;






        $home_news  = Navigation::query()->where('nav_category', 'Main')->where('page_type', '=', 'News')->where('page_status', '1')->orderBy('position', 'ASC')->paginate(3);


        $home_notices  = Navigation::query()->where('nav_category', 'Main')->where('page_type', '=', 'Notice')->where('page_status', '1')->orderBy('position', 'ASC')->paginate(4);

        $home_publications = Navigation::query()->where('nav_category', 'Main')->where('page_type', '=', 'Publication')->where('page_status', '1')->orderBy('position', 'ASC')->paginate(4);





        $Pop_up = Navigation::query()->where('nav_category', 'Home')->where('page_type', '=', 'Pop up')->where('page_status', '1')->orderBy('position', 'ASC')->get()->first();

        // return $popup;


        $jobs = Navigation::query()->where('page_type', 'Job')->latest()->paginate(10);
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%about%")->where('page_type', 'Group')->latest()->first() != null) {
            $about_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%about%")->where('page_type', 'Group')->latest()->first()->id;
            $About = Navigation::query()->where('parent_page_id', $about_id)->latest()->first();
        } else {
            $About = null;
        }






        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%partner%")->where('page_type', 'Group')->latest()->first() != null) {
            $partners_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%partner%")->where('page_type', 'Group')->latest()->first()->id;
            $partners = Navigation::query()->where('parent_page_id', $partners_id)->latest()->get();
            $section_heading = Navigation::find($partners_id);
            // return $notice_heading;
        } else {
            $partners = null;
        }

        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%statistic%")->where('page_type', 'Group')->latest()->first() != null) {
            $statistics_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%statistic%")->where('page_type', 'Group')->latest()->first()->id;
            $statistics = Navigation::query()->where('parent_page_id', $statistics_id)->latest()->get();
        } else {
            $statistics = null;
        }
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%testimonial%")->where('page_type', 'Group')->latest()->first() != null) {
            $testimonial_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%testimonial%")->where('page_type', 'Group')->latest()->first()->id;
            $testimonial = Navigation::query()->where('parent_page_id', $testimonial_id)->latest()->get();
            // return $testimonial;
        } else {
            $testimonial = [];
        }

        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%banner%")->where('page_type', 'Group')->latest()->first() != null) {
            $banner_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%banner%")->where('page_type', 'Group')->latest()->first()->id;
            $banners = Navigation::query()->where('parent_page_id', $banner_id)->latest()->get();
        } else {
            $banners = null;
        }
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%slider%")->where('page_type', 'Group')->latest()->first() != null) {
            $slider_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%slider%")->where('page_type', 'Group')->latest()->first()->id;
            $sliders = Navigation::query()->where('parent_page_id', $slider_id)->latest()->get();
            // return $sliders;
        } else {
            $sliders = null;
        }
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%misson%")->where('page_type', 'Group')->latest()->first() != null) {
            $misson_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%misson%")->where('page_type', 'Group')->latest()->first()->id;
            $missons = Navigation::query()->where('parent_page_id', $misson_id)->latest()->get();
            //return $misson;
        } else {
            $missons = null;
        }
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%message%")->where('page_type', 'Group')->latest()->first() != null) {
            $message_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%message%")->where('page_type', 'Group')->latest()->first()->id;
            $message = Navigation::query()->where('parent_page_id', $message_id)->latest()->first();
            // return $message;
        } else {
            $message = null;
        }



        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%process%")->where('page_type', 'Group')->latest()->first() != null) {
            $process_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%process%")->where('page_type', 'Group')->latest()->first()->id;
            $process = Navigation::query()->where('parent_page_id', $process_id)->latest()->get();
        } else {
            $process = null;
        }










        //return $misson;
        $job_categories = Navigation::all()->where('nav_category', 'Main')->where('page_type', 'Group')->where('banner_image', '!=', null);
        //sreturn $job_categories;
        $global_setting = GlobalSetting::all()->first();

        return view("website.index")->with(['testimonial' => $testimonial, 'statistics' => $statistics, 'partners' => $partners, 'jobs' => $jobs, 'banners' => $banners, 'about' => $About, 'menus' => $menus, 'global_setting' => $global_setting, 'sliders' => $sliders, 'missons' => $missons, 'job_categories' => $job_categories, 'message' => $message, 'process' => $process,  'home_notices' => $home_notices, 'home_publications' => $home_publications,  'Pop_up' => $Pop_up, 'home_product' => $home_product, 'home_news' => $home_news, 'home_product_data' => $home_product_data, 'home_best_products' => $home_best_products, 'section_heading' => $section_heading]);
    }



    public function category($menu)
    {
        //return $menu." this is category";




        $menus = Navigation::query()->where('nav_category', 'Main')->where('page_type', '!=', 'Job')->where('page_type', '!=', 'Photo Gallery')->where('page_type', '!=', 'Notice')->where('parent_page_id', 0)->where('page_status', '1')->orderBy('position', 'ASC')->get();



        //return $menus->first()->submenus;
        $jobs = Navigation::query()->where('page_type', 'Job')->latest()->get();
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%about%")->where('page_type', 'Group')->latest()->first() != null) {
            $about_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%about%")->where('page_type', 'Group')->latest()->first()->id;
            $About = Navigation::query()->where('parent_page_id', $about_id)->latest()->first();
        } else {
            $About = null;
        }



        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%banner%")->where('page_type', 'Group')->latest()->first() != null) {
            $banner_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%banner%")->where('page_type', 'Group')->latest()->first()->id;
            $banners = Navigation::query()->where('parent_page_id', $banner_id)->latest()->get();
        } else {
            $banners = null;
        }






        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%partner%")->where('page_type', 'Group')->latest()->first() != null) {
            $partners_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%partner%")->where('page_type', 'Group')->latest()->first()->id;
            $partners = Navigation::query()->where('parent_page_id', $partners_id)->latest()->get();
            // return $partners;
        } else {
            $partners = null;
        }





        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%slider%")->where('page_type', 'Group')->latest()->first() != null) {
            $slider_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%slider%")->where('page_type', 'Group')->latest()->first()->id;
            $sliders = Navigation::query()->where('parent_page_id', $slider_id)->latest()->get();
        } else {
            $sliders = null;
        }
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%misson%")->where('page_type', 'Group')->latest()->first() != null) {
            $misson_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%misson%")->where('page_type', 'Group')->latest()->first()->id;
            $missons = Navigation::query()->where('parent_page_id', $misson_id)->latest()->get();
            //return $misson;
        } else {
            $missons = null;
        }



        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%process%")->where('page_type', 'Group')->latest()->first() != null) {
            $process_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%process%")->where('page_type', 'Group')->latest()->first()->id;
            $process = Navigation::query()->where('parent_page_id', $process_id)->latest()->get();
        } else {
            $process = null;
        }



        $job_categories = Navigation::all()->where('nav_category', 'Main')->where('page_type', 'Group')->where('banner_image', '!=', null);
        //sreturn $job_categories;
        $global_setting = GlobalSetting::all()->first();
        if (Navigation::all()->where('nav_name', $menu)->count() > 0) {
            $job_id = Navigation::all()->where('nav_name', $menu)->first()->id;
            $jobs = Navigation::query()->where('parent_page_id', $job_id)->where('page_type', 'Job')->orderBy('created_at', 'desc')->get();
        } else {
            $jobs = null;
        }












        $slug_detail = Navigation::all()->where('nav_name', $menu)->first();
        //
        if (Navigation::all()->where('nav_name', $menu)->count() > 0) {
            //$normal_notice_page = Navigation::all()->where('nav_name',$slug)->first();
            $category_id = Navigation::all()->where('nav_name', $menu)->first()->id;

            if (Navigation::all()->where('parent_page_id', $category_id)->count() > 0) {
                $category_type = Navigation::all()->where('parent_page_id', $category_id)->first()->page_type;
            } else {
                $category_type = Navigation::all()->where('nav_name', $menu)->where('page_type', '!=', 'Notice')->first()->page_type;
            }
        } else {
            $category_type = null;
        }


        if ($category_type == "Photo Gallery") {
            //return "return to page gallary";
            $photos = Navigation::query()->where('parent_page_id', $category_id)->where('page_status', '1')->latest()->get();
            return view("website.gallery")->with(['partners', 'photos' => $photos, 'jobs' => $jobs, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail]);
        } elseif ($category_type == "Video Gallery") {
            // return "return to page gallary";
            $photos = Navigation::query()->where('parent_page_id', $category_id)->where('page_status', '1')->latest()->get();
            return view("website.gallery")->with(['photos' => $photos, 'jobs' => $jobs, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail]);
        } elseif ($category_type == "Job") {
            //return "return to view job";
            return view("website.job-list")->with(['jobs' => $jobs, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail]);
        } elseif ($category_type == "Notice") {
            // return "return to view Notice";
            $notices = Navigation::query()->where('parent_page_id', $category_id)->latest()->get();
            // return $notices;
            $notice_heading = Navigation::find($category_id);
            // return $notice_heading;

            return view("website.notice")->with(['notice_heading' => $notice_heading, 'notices' => $notices, 'jobs' => $jobs, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail]);
        } elseif ($category_type == "Group") {
            $normal = Navigation::find($category_id);
            $category = $normal->childs;
            // return $category;


            return view("website.category")->with(['normal' => $normal, 'jobs' => $jobs, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail, 'category' => $category]);
        } elseif ($category_type == "Normal") {
            $normal = Navigation::find($category_id);
            // return $normal;
            return view("website.inner")->with(['normal' => $normal, 'jobs' => $jobs, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail]);
        } elseif ($category_type == "News") {
            $page_parent = Navigation::find($category_id);
            $news_lists = Navigation::all()->where('page_type', 'News');
            // return $page_parent;
            return view("website.news")->with(['news_lists' => $news_lists, 'jobs' => $jobs, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail, 'page_parent' => $page_parent]);
        } elseif ($category_type == "Publication") {
            $page_parent = Navigation::find($category_id);
            $notices = Navigation::all()->where('page_type', 'Publication');
            // return $notices->first();
            $notice_heading = Navigation::find($category_id);

            return view("website.notice")->with(['notices' => $notices, 'jobs' => $jobs, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail, 'page_parent' => $page_parent, 'notice_heading' => $notice_heading]);
        } else {


            return redirect('/');
        }
    }






    public function subcategory($slug1, $submenu)
    {

        $menus = Navigation::query()->where('nav_category', 'Main')->where('page_type', '!=', 'Job')->where('page_type', '!=', 'Photo Gallery')->where('page_type', '!=', 'Notice')->where('parent_page_id', 0)->where('page_status', '1')->orderBy('position', 'ASC')->get();
        //return $menus->first()->submenus;
        $jobs = Navigation::query()->where('page_type', 'Job')->latest()->get();
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%about%")->where('page_type', 'Group')->latest()->first() != null) {
            $about_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%about%")->where('page_type', 'Group')->latest()->first()->id;
            $About = Navigation::query()->where('parent_page_id', $about_id)->latest()->first();
        } else {
            $About = null;
        }
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%banner%")->where('page_type', 'Group')->latest()->first() != null) {
            $banner_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%banner%")->where('page_type', 'Group')->latest()->first()->id;
            $banners = Navigation::query()->where('parent_page_id', $banner_id)->latest()->get();
        } else {
            $banners = null;
        }
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%message%")->where('page_type', 'Group')->latest()->first() != null) {
            $message_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%message%")->where('page_type', 'Group')->latest()->first()->id;
            $message = Navigation::query()->where('parent_page_id', $message_id)->latest()->first();
        } else {
            $message = null;
        }
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%partner%")->where('page_type', 'Group')->latest()->first() != null) {
            $partners_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%partner%")->where('page_type', 'Group')->latest()->first()->id;
            $partners = Navigation::query()->where('parent_page_id', $partners_id)->latest()->get();
            //return $partners;
        } else {
            $partners = null;
        }
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%slider%")->where('page_type', 'Group')->latest()->first() != null) {
            $slider_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%slider%")->where('page_type', 'Group')->latest()->first()->id;
            $sliders = Navigation::query()->where('parent_page_id', $slider_id)->latest()->get();
        } else {
            $sliders = null;
        }
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%misson%")->where('page_type', 'Group')->latest()->first() != null) {
            $misson_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%misson%")->where('page_type', 'Group')->latest()->first()->id;
            $missons = Navigation::query()->where('parent_page_id', $misson_id)->latest()->get();
        } else {
            $missons = null;
        }


        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%message%")->where('page_type', 'Group')->latest()->first() != null) {
            $message_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%message%")->where('page_type', 'Group')->latest()->first()->id;
            $message = Navigation::query()->where('parent_page_id', $message_id)->latest()->first();
        } else {
            $message = null;
        }


        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%process%")->where('page_type', 'Group')->latest()->first() != null) {
            $process_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%process%")->where('page_type', 'Group')->latest()->first()->id;
            $process = Navigation::query()->where('parent_page_id', $process_id)->latest()->get();
        } else {
            $process = null;
        }





        //return $misson;
        // $job_categories = Navigation::all()->where('nav_category', 'Main')->where('page_type', 'Group')->where('banner_image', '!=', null);
        //sreturn $job_categories;
        $global_setting = GlobalSetting::all()->first();

        if (Navigation::all()->where('nav_name', $submenu)->count() > 0) {
            $job_id = Navigation::all()->where('nav_name', $submenu)->first()->id;
            $jobs = Navigation::query()->where('parent_page_id', $job_id)->where('page_type', 'Job')->orderBy('created_at', 'desc')->get();
        } else {
            $jobs = null;
        }


        $slug_detail = Navigation::all()->where('nav_name', $submenu)->first();
        //
        if (Navigation::all()->where('nav_name', $submenu)->count() > 0) {
            $subcategory_id = Navigation::all()->where('nav_name', $submenu)->first()->id;
            if (Navigation::all()->where('parent_page_id', $subcategory_id)->count() > 0) {
                $subcategory_type = Navigation::all()->where('parent_page_id', $subcategory_id)->first()->page_type; //slug/slug2(GROUP)
            } else {
                //return Navigation::all()->where('nav_name',$submenu)->where('page_type','Normal')->first()->page_type;
                if (Navigation::all()->where('nav_name', $submenu)->where('page_type', 'Normal')->count() > 0) {
                    $subcategory_type = Navigation::all()->where('nav_name', $submenu)->where('page_type', 'Normal')->first()->page_type; //slug/slug2(group)

                } elseif (Navigation::all()->where('nav_name', $submenu)->where('page_type', 'Video Gallery')->count() > 0) {
                    $subcategory_type = Navigation::all()->where('nav_name', $submenu)->where('page_type', 'Video Gallery')->first()->page_type; //slug/slug2(group)


                } elseif (Navigation::all()->where('nav_name', $submenu)->where('page_type', 'Photo Gallery')->count() > 0) {
                    $navigataion_id = Navigation::where('nav_name', $submenu)->first()->id;
                    $photos = NavigationItems::where('navigation_id', $navigataion_id)->get();
                    return view("website.gallery_view")->with(['partners' => $partners, 'photos' => $photos, 'jobs' => $jobs, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail]);
                } elseif (Navigation::all()->where('nav_name', $submenu)->where('page_type', 'Courses')->count() > 0) {
                    $navigataion_id = Navigation::where('nav_name', $submenu)->first()->id;
                    $photos = NavigationItems::where('navigation_id', $navigataion_id)->get();
                    $information_detail = Navigation::find($navigataion_id);

                    return view("website.courses-details")->with(['partners' => $partners, 'photos' => $photos, 'jobs' => $jobs, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail, 'information_detail' => $information_detail]);
                } else {
                    return redirect('/');
                }
            }
        } else {
            $subcategory_type = null;
        }


        if ($subcategory_type == "Photo Gallery") {
            $photos = Navigation::query()->where('parent_page_id', $subcategory_id)->where('page_status', '1')->latest()->get();




            return view("website.gallery")->with(['partners' => $partners, 'photos' => $photos, 'jobs' => $jobs, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail]);
        } elseif ($subcategory_type == "Video Gallery") {
            $photos = NavigationVideoItems::where('navigation_id', $subcategory_id)->get();
            return view("website.video_gallery")->with(["partners" => $partners, 'photos' => $photos, 'jobs' => $jobs, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail]);
        } elseif ($subcategory_type == "Member") {
            $members = Navigation::query()->where('parent_page_id', $subcategory_id)->where('page_status', '1')->get();
            $information_detail = Navigation::find($subcategory_id);
            return view('website.member')->with(['partners' => $partners, 'members' => $members, 'jobs' => $jobs, 'menus' => $menus, 'sliders' => $sliders, 'information_detail' => $information_detail, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail]);
        } elseif ($subcategory_type == "Courses") {
            $members = Navigation::query()->where('parent_page_id', $subcategory_id)->where('page_status', '1')->latest()->get();
            $information_detail = Navigation::find($subcategory_id);
            return view('website.member')->with(['partners' => $partners, 'members' => $members, 'jobs' => $jobs, 'menus' => $menus, 'sliders' => $sliders, 'information_detail' => $information_detail, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail]);
        } elseif ($subcategory_type == "Group") {

            $notices = Navigation::query()->where('parent_page_id', $subcategory_id)->where('page_type', 'Group')->get();
            // return $notices;

            $notice_heading = Navigation::find($subcategory_id);

            // return $notice_heading;


            return view("website.products")->with(["partners" => $partners, 'notice_heading' => $notice_heading, 'notices' => $notices, 'jobs' => $jobs, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail]);
        } elseif ($subcategory_type == "Product") {
            $product_item_details = Navigation::query()->where('parent_page_id', $subcategory_id)->where('page_type', 'Product')->latest()->get();

            // return $product_item_details;

            $notice_heading = Navigation::find($subcategory_id);
            // return $notice_heading;


            return view("website.product-details")->with(["partners" => $partners, 'notice_heading' => $notice_heading, 'product_item_details' => $product_item_details, 'jobs' => $jobs, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail]);
        } elseif ($subcategory_type == "Normal") {
            $notice_heading = Navigation::query()->where('parent_page_id', $subcategory_id)->where('page_type', 'Normal')->latest()->get();

            $normal = Navigation::find($subcategory_id);
            // return $notice_heading;
            return view("website.inner")->with(["partners" => $partners, 'normal' => $normal, 'notice_heading' => $notice_heading, 'jobs' => $jobs, 'menus' => $menus, 'sliders' => $sliders, 'about' => $About, 'global_setting' => $global_setting, 'slug_detail' => $slug_detail]);
        } else {
            return redirect("/");
        }
    }



    public function singlePage($slug)
    {
        $normal = Navigation::all()->where('nav_name', $slug)->first();
        // return $normal;

        if (Navigation::query()->where('nav_category', 'Main')->where('nav_name',  $slug)->where('page_type', 'Notice')->latest()->first() != null) {
            // $information_detail = Navigation::find($information_id);
            $partners_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%partner%")->where('page_type', 'Notice')->latest()->first();
            $news_details = Navigation::query()->where('parent_page_id', $partners_id)->latest()->get();
        } else {
            $news_details = null;
        }
        $global_setting = GlobalSetting::all()->first();
        $menus = Navigation::query()->where('nav_category', 'Main')->where('page_type', '!=', 'Job')->where('page_type', '!=', 'Photo Gallery')->where('page_type', '!=', 'Notice')->where('parent_page_id', 0)->where('page_status', '1')->orderBy('position', 'ASC')->get();

        return view('website.inner')->with(["news_details" => $news_details, 'normal' => $normal,  'menus' => $menus, 'global_setting' => $global_setting]);
    }




    public function singleProductPage($slug)
    {
        $singlePage_data = Navigation::all()->where('nav_name', $slug)->first();
        // return $singlePage_data->childs;

        if (Navigation::query()->where('nav_category', 'Main')->where('nav_name',  $slug)->where('page_type', 'Notice')->latest()->first() != null) {
            // $information_detail = Navigation::find($information_id);
            $partners_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%partner%")->where('page_type', 'Notice')->latest()->first();
            $news_details = Navigation::query()->where('parent_page_id', $partners_id)->latest()->get();
        } else {
            $news_details = null;
        }
        $global_setting = GlobalSetting::all()->first();
        $menus = Navigation::query()->where('nav_category', 'Main')->where('page_type', '!=', 'Job')->where('page_type', '!=', 'Photo Gallery')->where('page_type', '!=', 'Notice')->where('parent_page_id', 0)->where('page_status', '1')->orderBy('position', 'ASC')->get();

        return view('website.inner')->with(["news_details" => $news_details, 'singlePage_data' => $singlePage_data,  'menus' => $menus, 'global_setting' => $global_setting]);
    }




    // message
    public function single_message($slug)
    {
        $singlePage_data = Navigation::all()->where('nav_name', $slug)->first();

        if (Navigation::query()->where('nav_category', 'Main')->where('nav_name',  $slug)->where('page_type', 'Notice')->latest()->first() != null) {
            // $information_detail = Navigation::find($information_id);
            $partners_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%partner%")->where('page_type', 'Notice')->latest()->first();
            $news_details = Navigation::query()->where('parent_page_id', $partners_id)->latest()->get();
        } else {
            $news_details = null;
        }


        $global_setting = GlobalSetting::all()->first();



        $menus = Navigation::query()->where('nav_category', 'Main')->where('page_type', '!=', 'Job')->where('page_type', '!=', 'Photo Gallery')->where('page_type', '!=', 'Notice')->where('parent_page_id', 0)->where('page_status', '1')->orderBy('position', 'ASC')->get();
        return view('website.message-from-executive')->with(["news_details" => $news_details, 'singlePage_data' => $singlePage_data,  'menus' => $menus, 'global_setting' => $global_setting]);
    }



    public function ReadMore($slug)
    {
        if (Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%message%")->where('page_type', 'Group')->latest()->first() != null) {
            $message_id = Navigation::query()->where('nav_category', 'Home')->where('nav_name', 'LIKE', "%message%")->where('page_type', 'Group')->latest()->first()->id;
            $message = Navigation::query()->where('parent_page_id', $message_id)->latest()->first();
        } else {
            $message = null;
        }
        $normal = Navigation::where('id', $slug)->first();
        //return $normal;
        $global_setting = GlobalSetting::all()->first();
        $menus = Navigation::query()->where('nav_category', 'Main')->where('page_type', '!=', 'Job')->where('page_type', '!=', 'Photo Gallery')->where('page_type', '!=', 'Notice')->where('parent_page_id', 0)->where('page_status', '1')->orderBy('position', 'ASC')->get();
        return view("website.normal")->with(['message' => $message, 'slug_detail' => $normal, 'normal' => $normal, 'menus' => $menus, 'global_setting' => $global_setting, 'job_slug' => $slug]);
    }


    public function allCategory()
    {
        $job_categories = Navigation::all()->where('nav_category', 'Main')->where('page_type', 'Group')->where('banner_image', '!=', null);
        $global_setting = GlobalSetting::all()->first();
        $menus = Navigation::query()->where('nav_category', 'Main')->where('page_type', '!=', 'Job')->where('page_type', '!=', 'Photo Gallery')->where('page_type', '!=', 'Notice')->where('parent_page_id', 0)->where('page_status', '1')->orderBy('position', 'ASC')->get();
        return view("website.all_category")->with(['job_categories' => $job_categories, 'menus' => $menus, 'global_setting' => $global_setting]);
    }


    public function allJobs()
    {
        $jobs = Navigation::query()->where('page_type', 'Job')->latest()->get();
        $global_setting = GlobalSetting::all()->first();
        $menus = Navigation::query()->where('nav_category', 'Main')->where('page_type', '!=', 'Job')->where('page_type', '!=', 'Photo Gallery')->where('page_type', '!=', 'Notice')->where('parent_page_id', 0)->where('page_status', '1')->orderBy('position', 'ASC')->get();
        return view("website.job-list")->with(['jobs' => $jobs, 'menus' => $menus, 'global_setting' => $global_setting]);
    }


    public function AllTestomonials()
    {
        $testomonials = Navigation::query()->where('page_type', 'Testomonials')->latest()->get();
        $global_setting = GlobalSetting::all()->first();
        $menus = Navigation::query()->where('nav_category', 'Main')->where('page_type', '!=', 'Job')->where('page_type', '!=', 'Photo Gallery')->where('page_type', '!=', 'Notice')->where('parent_page_id', 0)->where('page_status', '1')->orderBy('position', 'ASC')->get();
        return view("website.all-testomonials")->with(['testomonials' => $testomonials, 'menus' => $menus, 'global_setting' => $global_setting]);
    }




    public function GalleryView($slug)
    {
        $navigataion_id = Navigation::where('nav_name', $slug)->first()->id;
        $normal = Navigation::find($navigataion_id);
        // return $normal;


        $photos = NavigationItems::where('navigation_id', $navigataion_id)->get();
        // return $photos;
        $global_setting = GlobalSetting::all()->first();
        $menus = Navigation::query()->where('nav_category', 'Main')->where('page_type', '!=', 'Job')->where('page_type', '!=', 'Photo Gallery')->where('page_type', '!=', 'Notice')->where('parent_page_id', 0)->where('page_status', '1')->orderBy('position', 'ASC')->get();
        return view("website.gallery_view")->with(['photos' => $photos, 'menus' => $menus, 'global_setting' => $global_setting, 'normal' => $normal]);
    }
}
