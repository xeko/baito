<?php /* Template Name: Job Detail */ ?>
<?php get_header(); ?>
<div class="section" id="wrap-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">                                

                <!-- section -->
                <section class="bgwhite">
                    <div id="breadcrumb" class="breadcrumb inner wrap cf"><?php breadcrumb() ?></div>

                    <div class="stepbox clearfix">
                        <ul class="list-inline">
                            <li class="step01 step current"><span class="step-num">1</span>Nhập vào</li>
                            <li class="step02 step"><span class="step-num">2</span>Xác nhận</li>
                            <li class="step03 step"><span class="step-num">3</span>Hoàn tất</li>
                        </ul>
                    </div>

                    <div class="short-desc clearfix">
                        <p class="txt">Với ai chưa là thành viên, việc đăng ký thành viên sẽ hoàn tất cùng lúc với việc ứng tuyển.</p>
                        <p id="login_modal_open" class="open-login"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Đăng nhập để xem thông tin thành viên</p>
                    </div>

                    <div class="work-info well well-lg">
                        <?php
                        ?>
                        <p>Công việc: 【<a href="<?php the_permalink($_REQUEST['jobID']) ?>" target="_blank" data-toggle="tooltip" title="Xem chi tiết"><?php echo get_the_title($_REQUEST['jobID']) ?></a>】</p>
                    </div>                    

                    <div class="entry-content">
                        <h1 class="title-job">Ứng tuyển việc làm</h1>
                        <p class="txt">Hãy nhập thông tin cá nhân của bạn sau khi xác nhận thông tin tuyển dụng việc làm.</p>
                    </div>

                    <form id="entry_form" class="form-horizontal" action="<?php echo get_page_link(103)?>" method="post">
                        <?php wp_nonce_field( 'job_apply_nonce', 'job_apply_nonce_field' ); ?>
                        <input type="hidden" name="input_form[job_id]" value="<?php echo $_REQUEST['jobID']?>" />
                        <div class="form-group">
                            <label for="fullname" class="col-sm-3 control-label">Tên của bạn</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="fullname" name="input_form[fullname]" placeholder="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3">Giới tính</label>
                            <div class="col-sm-6">
                                <label class="radio-inline">
                                    <input type="radio" name="input_form[gender]" checked="" value="Female">Nam
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="input_form[gender]" value="Male">Nữ
                                </label>                                
                            </div>
                        </div> <!-- /.form-group -->
                        <div class="form-group">
                            <label for="birthday-year" class="col-sm-3 control-label">Ngày sinh</label>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <select name="input_form[birth_year]" class="form-control" id="birthday-year">
                                            <option>Year</option>
                                            <?php for ($i = 2008; $i >= 1980; $i--): ?>
                                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                            <?php endfor; ?>                                            
                                        </select>
                                    </div>
                                    <div class="col-xs-4">
                                        <select name="input_form[birth_month]" class="birthday-month form-control">
                                            <option>Month</option>
                                            <?php for ($i = 1; $i <= 12; $i++): ?>
                                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-4">
                                        <select name="input_form[birth_day]" class="birthday-day form-control">
                                            <option>Day</option>
                                            <?php for ($i = 1; $i < 31; $i++): ?>
                                                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /.form-group -->
                        <div class="form-group">
                            <label for="telephone_number" class="col-sm-3 control-label">Số điện thoại</label>
                            <div class="col-sm-6">
                                <input type="text" name="input_form[telephone_number]" id="telephone_number" value="" maxlength="12" class="form-control">
                            </div>
                        </div> <!-- /.form-group -->                        
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">E-mail</label>
                            <div class="col-sm-6">
                                <input type="email" id="email" name="input_form[email]" class="form-control" value="" placeholder="">
                            </div>
                        </div> <!-- /.form-group -->
                        <div class="form-group">
                            <label for="address" class="col-sm-3 control-label">Địa chỉ</label>
                            <div class="col-sm-6">
                                <input type="text" name="input_form[address]" id="address" class="form-control" value="" placeholder="">
                            </div>
                        </div> <!-- /.form-group -->
                        <div class="form-group">
                            <label for="job_type" class="col-sm-3 control-label">Nghề nghiệp</label>
                            <div class="col-sm-6">
                                <select name="input_form[job_type]" id="job_type" class="form-control">
                                    <option value="" class="dropdown-select option">　</option>
                                    <option value="12" selected="selected" class="dropdown-select option">Du học sinh</option>
                                    <option value="13" class="dropdown-select option">Ngày hội việc làm</option>
                                    <option value="01" class="dropdown-select option">Nghề tự do</option>
                                    <option value="06" class="dropdown-select option">Học sinh THPT</option>
                                    <option value="07" class="dropdown-select option">Sinh viên đại học, cao đẳng</option>
                                    <option value="03" class="dropdown-select option">Nữ nội trợ/Nam nội trợ</option>
                                    <option value="08" class="dropdown-select option">Nhân viên công ty</option>
                                    <option value="09" class="dropdown-select option">Nhân viên hợp đồng</option>
                                    <option value="10" class="dropdown-select option">Nhân viên tạm thời</option>
                                    <option value="11" class="dropdown-select option">Không nghề nghiệp</option>
                                    <option value="05" class="dropdown-select option">Khác</option>
                                </select>
                            </div>
                        </div> <!-- /.form-group -->
                        <div class="form-group">
                            <label for="nationality_code" class="col-sm-3 control-label">Quốc tịch</label>
                            <div class="col-sm-6">
                                <select name="input_form[nationality_code]" class="form-control" id="nationality_code">
                                    <option value="" class="dropdown-select option" id="sel_nationality_code-0">　</option>
                                    <option value="AF" class="dropdown-select option" id="sel_nationality_code-1">Afghanistan</option>
                                    <option value="AX" class="dropdown-select option" id="sel_nationality_code-2">Aland Islands</option>
                                    <option value="AL" selected="selected" class="dropdown-select option" id="sel_nationality_code-3">Albania</option>
                                    <option value="DZ" class="dropdown-select option" id="sel_nationality_code-4">Algeria</option>
                                    <option value="AS" class="dropdown-select option" id="sel_nationality_code-5">American Samoa</option>
                                    <option value="AD" class="dropdown-select option" id="sel_nationality_code-6">Andorra</option>
                                    <option value="AO" class="dropdown-select option" id="sel_nationality_code-7">Angola</option>
                                    <option value="AI" class="dropdown-select option" id="sel_nationality_code-8">Anguilla</option>
                                    <option value="AQ" class="dropdown-select option" id="sel_nationality_code-9">Antarctica</option>
                                    <option value="AG" class="dropdown-select option" id="sel_nationality_code-10">Antigua and Barbuda</option>
                                    <option value="AR" class="dropdown-select option" id="sel_nationality_code-11">Argentina</option>
                                    <option value="AM" class="dropdown-select option" id="sel_nationality_code-12">Armenia</option>
                                    <option value="AW" class="dropdown-select option" id="sel_nationality_code-13">Aruba</option>
                                    <option value="AU" class="dropdown-select option" id="sel_nationality_code-14">Australia</option>
                                    <option value="AT" class="dropdown-select option" id="sel_nationality_code-15">Austria</option>
                                    <option value="AZ" class="dropdown-select option" id="sel_nationality_code-16">Azerbaijan</option>
                                    <option value="BS" class="dropdown-select option" id="sel_nationality_code-17">Bahamas</option>
                                    <option value="BH" class="dropdown-select option" id="sel_nationality_code-18">Bahrain</option>
                                    <option value="BD" class="dropdown-select option" id="sel_nationality_code-19">Bangladesh</option>
                                    <option value="BB" class="dropdown-select option" id="sel_nationality_code-20">Barbados</option>
                                    <option value="BY" class="dropdown-select option" id="sel_nationality_code-21">Belarus</option>
                                    <option value="BE" class="dropdown-select option" id="sel_nationality_code-22">Belgium</option>
                                    <option value="BZ" class="dropdown-select option" id="sel_nationality_code-23">Belize</option>
                                    <option value="BJ" class="dropdown-select option" id="sel_nationality_code-24">Benin</option>
                                    <option value="BM" class="dropdown-select option" id="sel_nationality_code-25">Bermuda</option>
                                    <option value="BT" class="dropdown-select option" id="sel_nationality_code-26">Bhutan</option>
                                    <option value="BO" class="dropdown-select option" id="sel_nationality_code-27">Bolivia, Plurinational State of</option>
                                    <option value="BQ" class="dropdown-select option" id="sel_nationality_code-28">Bonaire, Saint Eustatius and Saba</option>
                                    <option value="BA" class="dropdown-select option" id="sel_nationality_code-29">Bosnia and Herzegovina</option>
                                    <option value="BW" class="dropdown-select option" id="sel_nationality_code-30">Botswana</option>
                                    <option value="BV" class="dropdown-select option" id="sel_nationality_code-31">Bouvet Island</option>
                                    <option value="BR" class="dropdown-select option" id="sel_nationality_code-32">Brazil</option>
                                    <option value="IO" class="dropdown-select option" id="sel_nationality_code-33">British Indian Ocean Territory</option>
                                    <option value="BN" class="dropdown-select option" id="sel_nationality_code-34">Brunei Darussalam</option>
                                    <option value="BG" class="dropdown-select option" id="sel_nationality_code-35">Bulgaria</option>
                                    <option value="BF" class="dropdown-select option" id="sel_nationality_code-36">Burkina Faso</option>
                                    <option value="BI" class="dropdown-select option" id="sel_nationality_code-37">Burundi</option>
                                    <option value="KH" class="dropdown-select option" id="sel_nationality_code-38">Cambodia</option>
                                    <option value="CM" class="dropdown-select option" id="sel_nationality_code-39">Cameroon</option>
                                    <option value="CA" class="dropdown-select option" id="sel_nationality_code-40">Canada</option>
                                    <option value="CV" class="dropdown-select option" id="sel_nationality_code-41">Cape Verde</option>
                                    <option value="KY" class="dropdown-select option" id="sel_nationality_code-42">Cayman Islands</option>
                                    <option value="CF" class="dropdown-select option" id="sel_nationality_code-43">Central African Republic</option>
                                    <option value="TD" class="dropdown-select option" id="sel_nationality_code-44">Chad</option>
                                    <option value="CL" class="dropdown-select option" id="sel_nationality_code-45">Chile</option>
                                    <option value="CN" class="dropdown-select option" id="sel_nationality_code-46">China</option>
                                    <option value="CX" class="dropdown-select option" id="sel_nationality_code-47">Christmas Island</option>
                                    <option value="CC" class="dropdown-select option" id="sel_nationality_code-48">Cocos (Keeling) Islands</option>
                                    <option value="CO" class="dropdown-select option" id="sel_nationality_code-49">Colombia</option>
                                    <option value="KM" class="dropdown-select option" id="sel_nationality_code-50">Comoros</option>
                                    <option value="CG" class="dropdown-select option" id="sel_nationality_code-51">Congo</option>
                                    <option value="CD" class="dropdown-select option" id="sel_nationality_code-52">Congo, the Democratic Republic of the</option>
                                    <option value="CK" class="dropdown-select option" id="sel_nationality_code-53">Cook Islands</option>
                                    <option value="CR" class="dropdown-select option" id="sel_nationality_code-54">Costa Rica</option>
                                    <option value="CI" class="dropdown-select option" id="sel_nationality_code-55">Cote d'Ivoire</option>
                                    <option value="HR" class="dropdown-select option" id="sel_nationality_code-56">Croatia</option>
                                    <option value="CU" class="dropdown-select option" id="sel_nationality_code-57">Cuba</option>
                                    <option value="CW" class="dropdown-select option" id="sel_nationality_code-58">Curaçao</option>
                                    <option value="CY" class="dropdown-select option" id="sel_nationality_code-59">Cyprus</option>
                                    <option value="CZ" class="dropdown-select option" id="sel_nationality_code-60">Czech Republic</option>
                                    <option value="DK" class="dropdown-select option" id="sel_nationality_code-61">Denmark</option>
                                    <option value="DJ" class="dropdown-select option" id="sel_nationality_code-62">Djibouti</option>
                                    <option value="DM" class="dropdown-select option" id="sel_nationality_code-63">Dominica</option>
                                    <option value="DO" class="dropdown-select option" id="sel_nationality_code-64">Dominican Republic</option>
                                    <option value="EC" class="dropdown-select option" id="sel_nationality_code-65">Ecuador</option>
                                    <option value="EG" class="dropdown-select option" id="sel_nationality_code-66">Egypt</option>
                                    <option value="SV" class="dropdown-select option" id="sel_nationality_code-67">El Salvador</option>
                                    <option value="GQ" class="dropdown-select option" id="sel_nationality_code-68">Equatorial Guinea</option>
                                    <option value="ER" class="dropdown-select option" id="sel_nationality_code-69">Eritrea</option>
                                    <option value="EE" class="dropdown-select option" id="sel_nationality_code-70">Estonia</option>
                                    <option value="ET" class="dropdown-select option" id="sel_nationality_code-71">Ethiopia</option>
                                    <option value="FK" class="dropdown-select option" id="sel_nationality_code-72">Falkland Islands (Malvinas)</option>
                                    <option value="FO" class="dropdown-select option" id="sel_nationality_code-73">Faroe Islands</option>
                                    <option value="FJ" class="dropdown-select option" id="sel_nationality_code-74">Fiji</option>
                                    <option value="FI" class="dropdown-select option" id="sel_nationality_code-75">Finland</option>
                                    <option value="FR" class="dropdown-select option" id="sel_nationality_code-76">France</option>
                                    <option value="GF" class="dropdown-select option" id="sel_nationality_code-77">French Guiana</option>
                                    <option value="PF" class="dropdown-select option" id="sel_nationality_code-78">French Polynesia</option>
                                    <option value="TF" class="dropdown-select option" id="sel_nationality_code-79">French Southern Territories</option>
                                    <option value="GA" class="dropdown-select option" id="sel_nationality_code-80">Gabon</option>
                                    <option value="GM" class="dropdown-select option" id="sel_nationality_code-81">Gambia</option>
                                    <option value="GE" class="dropdown-select option" id="sel_nationality_code-82">Georgia</option>
                                    <option value="DE" class="dropdown-select option" id="sel_nationality_code-83">Germany</option>
                                    <option value="GH" class="dropdown-select option" id="sel_nationality_code-84">Ghana</option>
                                    <option value="GI" class="dropdown-select option" id="sel_nationality_code-85">Gibraltar</option>
                                    <option value="GR" class="dropdown-select option" id="sel_nationality_code-86">Greece</option>
                                    <option value="GL" class="dropdown-select option" id="sel_nationality_code-87">Greenland</option>
                                    <option value="GD" class="dropdown-select option" id="sel_nationality_code-88">Grenada</option>
                                    <option value="GP" class="dropdown-select option" id="sel_nationality_code-89">Guadeloupe</option>
                                    <option value="GU" class="dropdown-select option" id="sel_nationality_code-90">Guam</option>
                                    <option value="GT" class="dropdown-select option" id="sel_nationality_code-91">Guatemala</option>
                                    <option value="GG" class="dropdown-select option" id="sel_nationality_code-92">Guernsey</option>
                                    <option value="GN" class="dropdown-select option" id="sel_nationality_code-93">Guinea</option>
                                    <option value="GW" class="dropdown-select option" id="sel_nationality_code-94">Guinea-Bissau</option>
                                    <option value="GY" class="dropdown-select option" id="sel_nationality_code-95">Guyana</option>
                                    <option value="HT" class="dropdown-select option" id="sel_nationality_code-96">Haiti</option>
                                    <option value="HM" class="dropdown-select option" id="sel_nationality_code-97">Heard Island and McDonald Islands</option>
                                    <option value="VA" class="dropdown-select option" id="sel_nationality_code-98">Holy See (Vatican City State)</option>
                                    <option value="HN" class="dropdown-select option" id="sel_nationality_code-99">Honduras</option>
                                    <option value="HK" class="dropdown-select option" id="sel_nationality_code-100">Hong Kong</option>
                                    <option value="HU" class="dropdown-select option" id="sel_nationality_code-101">Hungary</option>
                                    <option value="IS" class="dropdown-select option" id="sel_nationality_code-102">Iceland</option>
                                    <option value="IN" class="dropdown-select option" id="sel_nationality_code-103">India</option>
                                    <option value="ID" class="dropdown-select option" id="sel_nationality_code-104">Indonesia</option>
                                    <option value="IR" class="dropdown-select option" id="sel_nationality_code-105">Iran, Islamic Republic of</option>
                                    <option value="IQ" class="dropdown-select option" id="sel_nationality_code-106">Iraq</option>
                                    <option value="IE" class="dropdown-select option" id="sel_nationality_code-107">Ireland</option>
                                    <option value="IM" class="dropdown-select option" id="sel_nationality_code-108">Isle of Man</option>
                                    <option value="IL" class="dropdown-select option" id="sel_nationality_code-109">Israel</option>
                                    <option value="IT" class="dropdown-select option" id="sel_nationality_code-110">Italy</option>
                                    <option value="JM" class="dropdown-select option" id="sel_nationality_code-111">Jamaica</option>
                                    <option value="JP" class="dropdown-select option" id="sel_nationality_code-112">Japan</option>
                                    <option value="JE" class="dropdown-select option" id="sel_nationality_code-113">Jersey</option>
                                    <option value="JO" class="dropdown-select option" id="sel_nationality_code-114">Jordan</option>
                                    <option value="KZ" class="dropdown-select option" id="sel_nationality_code-115">Kazakhstan</option>
                                    <option value="KE" class="dropdown-select option" id="sel_nationality_code-116">Kenya</option>
                                    <option value="KI" class="dropdown-select option" id="sel_nationality_code-117">Kiribati</option>
                                    <option value="KP" class="dropdown-select option" id="sel_nationality_code-118">Korea, Democratic People's Republic of</option>
                                    <option value="KR" class="dropdown-select option" id="sel_nationality_code-119">Korea, Republic of</option>
                                    <option value="KW" class="dropdown-select option" id="sel_nationality_code-120">Kuwait</option>
                                    <option value="KG" class="dropdown-select option" id="sel_nationality_code-121">Kyrgyzstan</option>
                                    <option value="LA" class="dropdown-select option" id="sel_nationality_code-122">Lao People's Democratic Republic</option>
                                    <option value="LV" class="dropdown-select option" id="sel_nationality_code-123">Latvia</option>
                                    <option value="LB" class="dropdown-select option" id="sel_nationality_code-124">Lebanon</option>
                                    <option value="LS" class="dropdown-select option" id="sel_nationality_code-125">Lesotho</option>
                                    <option value="LR" class="dropdown-select option" id="sel_nationality_code-126">Liberia</option>
                                    <option value="LY" class="dropdown-select option" id="sel_nationality_code-127">Libyan Arab Jamahiriya</option>
                                    <option value="LI" class="dropdown-select option" id="sel_nationality_code-128">Liechtenstein</option>
                                    <option value="LT" class="dropdown-select option" id="sel_nationality_code-129">Lithuania</option>
                                    <option value="LU" class="dropdown-select option" id="sel_nationality_code-130">Luxembourg</option>
                                    <option value="MO" class="dropdown-select option" id="sel_nationality_code-131">Macao</option>
                                    <option value="MK" class="dropdown-select option" id="sel_nationality_code-132">Macedonia, the former Yugoslav Republic of</option>
                                    <option value="MG" class="dropdown-select option" id="sel_nationality_code-133">Madagascar</option>
                                    <option value="MW" class="dropdown-select option" id="sel_nationality_code-134">Malawi</option>
                                    <option value="MY" class="dropdown-select option" id="sel_nationality_code-135">Malaysia</option>
                                    <option value="MV" class="dropdown-select option" id="sel_nationality_code-136">Maldives</option>
                                    <option value="ML" class="dropdown-select option" id="sel_nationality_code-137">Mali</option>
                                    <option value="MT" class="dropdown-select option" id="sel_nationality_code-138">Malta</option>
                                    <option value="MH" class="dropdown-select option" id="sel_nationality_code-139">Marshall Islands</option>
                                    <option value="MQ" class="dropdown-select option" id="sel_nationality_code-140">Martinique</option>
                                    <option value="MR" class="dropdown-select option" id="sel_nationality_code-141">Mauritania</option>
                                    <option value="MU" class="dropdown-select option" id="sel_nationality_code-142">Mauritius</option>
                                    <option value="YT" class="dropdown-select option" id="sel_nationality_code-143">Mayotte</option>
                                    <option value="MX" class="dropdown-select option" id="sel_nationality_code-144">Mexico</option>
                                    <option value="FM" class="dropdown-select option" id="sel_nationality_code-145">Micronesia, Federated States of</option>
                                    <option value="MD" class="dropdown-select option" id="sel_nationality_code-146">Moldova, Republic of</option>
                                    <option value="MC" class="dropdown-select option" id="sel_nationality_code-147">Monaco</option>
                                    <option value="MN" class="dropdown-select option" id="sel_nationality_code-148">Mongolia</option>
                                    <option value="ME" class="dropdown-select option" id="sel_nationality_code-149">Montenegro</option>
                                    <option value="MS" class="dropdown-select option" id="sel_nationality_code-150">Montserrat</option>
                                    <option value="MA" class="dropdown-select option" id="sel_nationality_code-151">Morocco</option>
                                    <option value="MZ" class="dropdown-select option" id="sel_nationality_code-152">Mozambique</option>
                                    <option value="MM" class="dropdown-select option" id="sel_nationality_code-153">Myanmar</option>
                                    <option value="NA" class="dropdown-select option" id="sel_nationality_code-154">Namibia</option>
                                    <option value="NR" class="dropdown-select option" id="sel_nationality_code-155">Nauru</option>
                                    <option value="NP" class="dropdown-select option" id="sel_nationality_code-156">Nepal</option>
                                    <option value="NL" class="dropdown-select option" id="sel_nationality_code-157">Netherlands</option>
                                    <option value="NC" class="dropdown-select option" id="sel_nationality_code-158">New Caledonia</option>
                                    <option value="NZ" class="dropdown-select option" id="sel_nationality_code-159">New Zealand</option>
                                    <option value="NI" class="dropdown-select option" id="sel_nationality_code-160">Nicaragua</option>
                                    <option value="NE" class="dropdown-select option" id="sel_nationality_code-161">Niger</option>
                                    <option value="NG" class="dropdown-select option" id="sel_nationality_code-162">Nigeria</option>
                                    <option value="NU" class="dropdown-select option" id="sel_nationality_code-163">Niue</option>
                                    <option value="NF" class="dropdown-select option" id="sel_nationality_code-164">Norfolk Island</option>
                                    <option value="MP" class="dropdown-select option" id="sel_nationality_code-165">Northern Mariana Islands</option>
                                    <option value="NO" class="dropdown-select option" id="sel_nationality_code-166">Norway</option>
                                    <option value="OM" class="dropdown-select option" id="sel_nationality_code-167">Oman</option>
                                    <option value="PK" class="dropdown-select option" id="sel_nationality_code-168">Pakistan</option>
                                    <option value="PW" class="dropdown-select option" id="sel_nationality_code-169">Palau</option>
                                    <option value="PS" class="dropdown-select option" id="sel_nationality_code-170">Palestinian Territory, Occupied</option>
                                    <option value="PA" class="dropdown-select option" id="sel_nationality_code-171">Panama</option>
                                    <option value="PG" class="dropdown-select option" id="sel_nationality_code-172">Papua New Guinea</option>
                                    <option value="PY" class="dropdown-select option" id="sel_nationality_code-173">Paraguay</option>
                                    <option value="PE" class="dropdown-select option" id="sel_nationality_code-174">Peru</option>
                                    <option value="PH" class="dropdown-select option" id="sel_nationality_code-175">Philippines</option>
                                    <option value="PN" class="dropdown-select option" id="sel_nationality_code-176">Pitcairn</option>
                                    <option value="PL" class="dropdown-select option" id="sel_nationality_code-177">Poland</option>
                                    <option value="PT" class="dropdown-select option" id="sel_nationality_code-178">Portugal</option>
                                    <option value="PR" class="dropdown-select option" id="sel_nationality_code-179">Puerto Rico</option>
                                    <option value="QA" class="dropdown-select option" id="sel_nationality_code-180">Qatar</option>
                                    <option value="RE" class="dropdown-select option" id="sel_nationality_code-181">Reunion</option>
                                    <option value="RO" class="dropdown-select option" id="sel_nationality_code-182">Romania</option>
                                    <option value="RU" class="dropdown-select option" id="sel_nationality_code-183">Russian Federation</option>
                                    <option value="RW" class="dropdown-select option" id="sel_nationality_code-184">Rwanda</option>
                                    <option value="BL" class="dropdown-select option" id="sel_nationality_code-185">Saint Barthélemy</option>
                                    <option value="SH" class="dropdown-select option" id="sel_nationality_code-186">Saint Helena, Ascension and Tristan da Cunha</option>
                                    <option value="KN" class="dropdown-select option" id="sel_nationality_code-187">Saint Kitts and Nevis</option>
                                    <option value="LC" class="dropdown-select option" id="sel_nationality_code-188">Saint Lucia</option>
                                    <option value="MF" class="dropdown-select option" id="sel_nationality_code-189">Saint Martin (French part)</option>
                                    <option value="PM" class="dropdown-select option" id="sel_nationality_code-190">Saint Pierre and Miquelon</option>
                                    <option value="VC" class="dropdown-select option" id="sel_nationality_code-191">Saint Vincent and the Grenadines</option>
                                    <option value="WS" class="dropdown-select option" id="sel_nationality_code-192">Samoa</option>
                                    <option value="SM" class="dropdown-select option" id="sel_nationality_code-193">San Marino</option>
                                    <option value="ST" class="dropdown-select option" id="sel_nationality_code-194">Sao Tome and Principe</option>
                                    <option value="SA" class="dropdown-select option" id="sel_nationality_code-195">Saudi Arabia</option>
                                    <option value="SN" class="dropdown-select option" id="sel_nationality_code-196">Senegal</option>
                                    <option value="RS" class="dropdown-select option" id="sel_nationality_code-197">Serbia</option>
                                    <option value="SC" class="dropdown-select option" id="sel_nationality_code-198">Seychelles</option>
                                    <option value="SL" class="dropdown-select option" id="sel_nationality_code-199">Sierra Leone</option>
                                    <option value="SG" class="dropdown-select option" id="sel_nationality_code-200">Singapore</option>
                                    <option value="SX" class="dropdown-select option" id="sel_nationality_code-201">Sint Maarten (Dutch part)</option>
                                    <option value="SK" class="dropdown-select option" id="sel_nationality_code-202">Slovakia</option>
                                    <option value="SI" class="dropdown-select option" id="sel_nationality_code-203">Slovenia</option>
                                    <option value="SB" class="dropdown-select option" id="sel_nationality_code-204">Solomon Islands</option>
                                    <option value="SO" class="dropdown-select option" id="sel_nationality_code-205">Somalia</option>
                                    <option value="ZA" class="dropdown-select option" id="sel_nationality_code-206">South Africa</option>
                                    <option value="GS" class="dropdown-select option" id="sel_nationality_code-207">South Georgia and the South Sandwich Islands</option>
                                    <option value="SS" class="dropdown-select option" id="sel_nationality_code-208">South Sudan</option>
                                    <option value="ES" class="dropdown-select option" id="sel_nationality_code-209">Spain</option>
                                    <option value="LK" class="dropdown-select option" id="sel_nationality_code-210">Sri Lanka</option>
                                    <option value="SD" class="dropdown-select option" id="sel_nationality_code-211">Sudan</option>
                                    <option value="SR" class="dropdown-select option" id="sel_nationality_code-212">Suriname</option>
                                    <option value="SJ" class="dropdown-select option" id="sel_nationality_code-213">Svalbard and Jan Mayen</option>
                                    <option value="SZ" class="dropdown-select option" id="sel_nationality_code-214">Swaziland</option>
                                    <option value="SE" class="dropdown-select option" id="sel_nationality_code-215">Sweden</option>
                                    <option value="CH" class="dropdown-select option" id="sel_nationality_code-216">Switzerland</option>
                                    <option value="SY" class="dropdown-select option" id="sel_nationality_code-217">Syrian Arab Republic</option>
                                    <option value="TW" class="dropdown-select option" id="sel_nationality_code-218">Taiwan, Province of China</option>
                                    <option value="TJ" class="dropdown-select option" id="sel_nationality_code-219">Tajikistan</option>
                                    <option value="TZ" class="dropdown-select option" id="sel_nationality_code-220">Tanzania, United Republic of</option>
                                    <option value="TH" class="dropdown-select option" id="sel_nationality_code-221">Thailand</option>
                                    <option value="TL" class="dropdown-select option" id="sel_nationality_code-222">Timor-Leste</option>
                                    <option value="TG" class="dropdown-select option" id="sel_nationality_code-223">Togo</option>
                                    <option value="TK" class="dropdown-select option" id="sel_nationality_code-224">Tokelau</option>
                                    <option value="TO" class="dropdown-select option" id="sel_nationality_code-225">Tonga</option>
                                    <option value="TT" class="dropdown-select option" id="sel_nationality_code-226">Trinidad and Tobago</option>
                                    <option value="TN" class="dropdown-select option" id="sel_nationality_code-227">Tunisia</option>
                                    <option value="TR" class="dropdown-select option" id="sel_nationality_code-228">Turkey</option>
                                    <option value="TM" class="dropdown-select option" id="sel_nationality_code-229">Turkmenistan</option>
                                    <option value="TC" class="dropdown-select option" id="sel_nationality_code-230">Turks and Caicos Islands</option>
                                    <option value="TV" class="dropdown-select option" id="sel_nationality_code-231">Tuvalu</option>
                                    <option value="UG" class="dropdown-select option" id="sel_nationality_code-232">Uganda</option>
                                    <option value="UA" class="dropdown-select option" id="sel_nationality_code-233">Ukraine</option>
                                    <option value="AE" class="dropdown-select option" id="sel_nationality_code-234">United Arab Emirates</option>
                                    <option value="GB" class="dropdown-select option" id="sel_nationality_code-235">United Kingdom</option>
                                    <option value="US" class="dropdown-select option" id="sel_nationality_code-236">United States</option>
                                    <option value="UM" class="dropdown-select option" id="sel_nationality_code-237">United States Minor Outlying Islands</option>
                                    <option value="UY" class="dropdown-select option" id="sel_nationality_code-238">Uruguay</option>
                                    <option value="UZ" class="dropdown-select option" id="sel_nationality_code-239">Uzbekistan</option>
                                    <option value="VU" class="dropdown-select option" id="sel_nationality_code-240">Vanuatu</option>
                                    <option value="VE" class="dropdown-select option" id="sel_nationality_code-241">Venezuela, Bolivarian Republic of</option>
                                    <option value="VN" class="dropdown-select option" id="sel_nationality_code-242">Viet Nam</option>
                                    <option value="VG" class="dropdown-select option" id="sel_nationality_code-243">Virgin Islands, British</option>
                                    <option value="VI" class="dropdown-select option" id="sel_nationality_code-244">Virgin Islands, U.S.</option>
                                    <option value="WF" class="dropdown-select option" id="sel_nationality_code-245">Wallis and Futuna</option>
                                    <option value="EH" class="dropdown-select option" id="sel_nationality_code-246">Western Sahara</option>
                                    <option value="YE" class="dropdown-select option" id="sel_nationality_code-247">Yemen</option>
                                    <option value="ZM" class="dropdown-select option" id="sel_nationality_code-248">Zambia</option>
                                    <option value="ZW" class="dropdown-select option" id="sel_nationality_code-249">Zimbabwe</option>
                                </select>
                            </div>
                        </div> <!-- /.form-group -->
                        <div class="form-group">
                            <label for="jlpt_code" class="col-sm-3 control-label">Kỳ thi Năng lực tiếng Nhật (JLPT)</label>
                            <div class="col-sm-6">
                                <select name="input_form[jlpt_code]" class="form-control" id="jlpt_code">
                                    <option value="" selected="selected" class="dropdown-select option">　</option>
                                    <option value="01" class="dropdown-select option">N1</option>
                                    <option value="02" class="dropdown-select option">N2</option>
                                    <option value="03" class="dropdown-select option">N3</option>
                                    <option value="04" class="dropdown-select option">N4</option>
                                    <option value="05" class="dropdown-select option">N5</option>
                                    <option value="99" class="dropdown-select option">Chưa thi tiếng nhật</option>
                                </select>
                            </div>
                        </div> <!-- /.form-group -->
                        <div class="form-group">
                            <label for="japanese_level_code" class="col-sm-3 control-label">Trình độ tiếng Nhật</label>
                            <div class="col-sm-6">
                                <select name="input_form[japanese_level_code]" id="japanese_level_code" class="form-control">
                                    <option value="" selected="selected" class="dropdown-select option">　</option>
                                    <option value="A">Sơ cấp</option>
                                    <option value="B">Trung cấp</option>
                                    <option value="C">Cao cấp</option>
                                </select>
                                <div class="explain-txt small">
                                    <p class="ttl"><strong>Sơ cấp:</strong> trình độ sơ đẳng</p>
                                    <p class="txt">Có thể tương tác ở một lời chào đơn giản và giới thiệu</p>
                                    <p class="ttl"><strong>Trung cấp:</strong> trình độ giao tiếp thông thường</p>
                                    <p class="txt">Sự kết hợp của từ trong cuộc sống hàng ngày và cuộc trò chuyện</p>
                                    <p class="ttl"><strong>Cao cấp:</strong> trình độ tiếng Nhật thương mại</p>
                                    <p class="txt">Lưu loát, đều thông thạo tiếng Nhật</p>
                                </div>
                            </div>
                        </div> <!-- /.form-group -->                        
                        <div class="form-group">
                            <label for="entry_appeal_point" class="col-sm-3 control-label">Giới thiệu bản thân</label>
                            <div class="col-sm-6">
                                <textarea name="input_form[entry_appeal_point]" id="entry_appeal_point" class="form-control" rows="6" 
                                          placeholder="Hãy chứng tỏ bản thân để được nhà tuyển dụng lựa chọn!"></textarea>
                            </div>
                        </div> <!-- /.form-group -->                        
                        <div class="form-group">
                            <div class="col-sm-3 col-sm-offset-3">
                                <button type="submit" value="submit" class="btn btn-primary btn-block btn-lg">Xác nhận nội dung</button>
                            </div>                            
                        </div> <!-- /.form-group -->

                    </form>



                    <div id="login_modal" class="login-modal modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">                                

                            </div>
                        </div>
                    </div>

                </section>
            </div>
            <div class="col-md-4">
                <?php get_sidebar() ?>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();

