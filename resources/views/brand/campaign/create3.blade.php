@extends('brand.layouts.app')
 

@section('css')
  @parent
    <!-- <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> -->
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/summernote/summernote-bs4.css' }}">
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/codemirror/lib/codemirror.css' }}">
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/codemirror/theme/duotone-dark.css' }}">
  <!-- <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/jquery-selectric/selectric.css' }}"> -->
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/select2/dist/css/select2.min.css' }}">
  <!-- <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css' }}"> -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->


@endsection


 
@section('content')
  <!-- Main Content -->
  <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>New Campaign</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('brand.dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{ route('brand.campaign.list')}}">Campaign</a></div>
              <div class="breadcrumb-item">New</div>
            </div>
          </div>

          <div class="section-body">
           <!--  <h2 class="section-title">Wizard</h2>
            <p class="section-lead">The wizard is a component to simplify a process with a step-by-step method.</p> -->

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Create New Campaign</h4>
                  </div>
                  <div class="card-body">
                    <div class="row mt-4">
                      <div class="col-12 col-lg-8 offset-lg-2">
                        <div class="wizard-steps">
                          <div class="wizard-step ">
                            <div class="wizard-step-icon">
                              <i class="far fa-user"></i>
                            </div>
                            <div class="wizard-step-label">
                              Campaign Details
                            </div>
                          </div>
                          <div class="wizard-step">
                            <div class="wizard-step-icon">
                              <i class="fas fa-box-open"></i>
                            </div>
                            <div class="wizard-step-label">
                              Platform Details
                            </div>
                          </div>
                          <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                              <i class="fas fa-server"></i>
                            </div>
                            <div class="wizard-step-label">
                              Influencer Details
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <form class="wizard-content mt-2" method="POST" @if(isset($campaign) && !empty($campaign))  action="{{ route('brand.campaign.finalcreate',$campaign->unique_id) }}" @else action="{{ route('brand.campaign.finalcreate') }}" @endif id="form" enctype="multipart/form-data">
                      @csrf
                      <div class="wizard-pane">
                        <div class="form-group row">
                          <label class="col-md-4 text-md-right text-left mt-2">Category*</label>
                          <div class="col-lg-6 col-md-8">
                            <div class="selectgroup w-100">
                              <label class="selectgroup-item">
                                <div class="form-group">
                                  <!-- <label>jQuery Selectric Multiple</label> -->
                                  @php
                                    $category_arr = [];
                                    if(isset($campaign) && !empty($campaign)){
                                      if($campaign->categories()->count()){
                                        $category_arr = array_column($campaign->categories->toArray(), 'category');
                                      }
                                    }
                                  @endphp
                                  <select class="form-control select2"
                                  multiple="" name="influencer_categories[]" required>
                                    @foreach($categories as $cat)
                                    <option value="{{$cat->name}}" @if(in_array($cat->name, $category_arr)) selected="selected" @endif >{{$cat->name}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-4 text-md-right text-left mt-2">Location*</label>
                          <div class="col-lg-6 col-md-8">
                            <div class="selectgroup w-100">
                              <label class="selectgroup-item">
                                <div class="form-group">
                                    <!-- <label>jQuery Selectric Multiple</label> -->
                                    @php
                                      $location_arr = [];
                                      if(isset($campaign) && !empty($campaign)){
                                        if($campaign->locations()->count()){
                                          $location_arr = array_column($campaign->locations->toArray(), 'location');  
                                        }
                                      }
                                      $locations = ['Abhaipur','Abhayapuri','Abohar','Abu Road','Achheja','Adalaj','Adampur','Adamwal','Adardih','Adari','Adaun','Addanki','Adhartal','Adirampattinam','Adoni','Agar','Agarkhed','Agarpara','Agartala','Agnigundala','Agolai','Agonda','Agra','Agri','Ahirka','Ahmedabad','Ahmednagar','Ahulana','Airoli','Aizawl','Ajgara','Ajhaur','Ajjavara','Ajmer','Akbaria','Akha','Akhara','Akhepura','Akkampeta','Aklia','Akola','Akorha','Akot','Akurdi','Alamnagar','Alampur','Alanahalli','Alappuzha','Alawalpur','Alibag','Aliganj','Aligarh','Alipur Bangawan','Alipura','Aliwal','Aliyanilai','Alkapuri','Allachaur','Allagadda','Allahabad','Allowal','Alot','Aluva','Alwar','Amalapuram','Amalner','Amaravati','Amarsar','Amarwasi','Amauli','Amayur','Amb','Ambachandan','Ambah','Ambajipeta','Ambajogai','Ambakapalle','Ambala','Ambalavayal','Amballur','Ambarnath','Ambativalasa','Ambattur','Ambheti','Ambur','Amet','Amethi','Amloh','Amoi','Amolwa','Amraigaon','Amrapur','Amravati','Amreli','Amritsar','Amroha','Amroli','Amruthahalli','Amta','Anamasamudrampeta','Anand','Anand Parbat','Anantapur','Anantnag','Anaparthy','Anchal','Andal','Andarkuppam','Andheri','Andheri East','Anegundi','Angallu','Angol','Angul','Aniyaram','Anjar','Anjugramam','Anjuna','Ankleshwar','Anna Nagar','Annamalainagar','Annavaram','Anthiyur','Anupgarh','Anuppur','Arabaka','Arail','Arakkonam','Arambagh','Aranarai','Arani','Araria','Arcot','Ariyalur','Ariyanendal','Arjunganj','Arjuni','Arki','Arni','Aroor','Arrah','Arumanai','Aruvankadu','Asa Khera','Asalwas','Asandra','Asansol','Ashapur','Ashta','Assagao','Assi','Atai','Athani','Attadappa','Attili','Attingal','Attur','Auli','Aung','Auraiya','Aurangabad','Auroville','Avadi','Avinashi','Awan','Ayali Kalan','Ayilakkad','Ayodhya','Ayur','Ayyavadi','Azamgarh','Babail','Babhnoul','Babrala','Bachhaon','Badarpur','Baddi','Badhawar','Badheri','Badheri Ghoghu','Badian','Badlapur','Baduhi','Baduria','Bagalkot','Bagawas','Bagha Purana','Baghar','Bagnan','Bagpat','Bagthala','Bagula','Bahadurgarh','Bahadurpur','Baharampur','Baharu','Baharwal','Bahraich','Bahu Akbarpur','Baidmara','Baihar','Baincha','Bairua','Bakhira','Bakhri Dua','Bakhtiyarpur','Balachaur','Balaghat','Balanda','Balangir','Balasore','Balehonnur','Balh Churani','Balhampur','Balicha','Balisahi','Ballabgarh','Ballamgarh','Ballarpur','Ballia','Ballupura','Ballygunge','Balotra','Balugaon','Balurghat','Bambolim','Bamni','Bamroda','Ban','Banala','Banarhat','Banda','Bandel','Bandikui','Banga','Bangaon','Bangarapet','Banhpur','Bani Park','Banihal','Banjar','Bankegaon','Bankura','Banswara','Banur','Bapatla','Bara Ghaghra','Baraini','Baramati','Baran','Baranagar','Barari','Barasat','Baraut','Barbil','Bardez','Bardhaman','Bardoli','Barebettu','Bareilly','Bargachia','Bargaon','Bargarh','Bargur','Barharwa','Barhiya','Bari','Bariatu','Baripada','Barmer','Barnala','Barnia','Barpeta','Barra','Barsana','Barughutu','Baruipur','Barwala','Barwani','Basana','Basantpur','Basarke','Basirhat','Basoda','Basti','Batala','Bathinda','Bati','Bayad','Bayana','Beas','Beawar','Bedradka','Beed','Begampur','Begun','Begusarai','Behala','Behat','Behror','Belaguru','Belda','Beldanga','Belgachia','Belgaum','Belgharia','Bellary','Belpahar','Belra','Bengaluru','Beohara','Beohari','Berasia','Betnoti','Bettiah','Betul','Bhadaiyan','Bhadohi','Bhadrachalam','Bhadravaram','Bhadravati','Bhadreswar','Bhagalpur','Bhagwangola','Bhagwanpura','Bhamragarh','Bhandara','Bhandsar','Bhanjanagar','Bhanvad','Bharam','Bharatpur','Bharuch','Bhasgaon','Bhatha','Bhatkal','Bhatta Bazar','Bhavnagar','Bhawanipatna','Bhiloda','Bhilwara','Bhimadolu','Bhimavaram','Bhinmal','Bhiwadi','Bhiwandi','Bhiwani','Bhoj','Bhokardan','Bhopal','Bhose','Bhubaneswar','Bhucho Mandi','Bhuj','Bhuntar','Bhurkunda','Biaora','Bidar','Bihar Sharif','Bihariganj','Bihta','Bijapur','Bijni','Bijnor','Bikaner','Bikapur','Bikramganj','Bilaspur','Bilga','Bilimora','Bindki','Birmitrapur','Birpara','Bisalpur','Bisrakh','Biswanath Chariali','Bittangala','Boisar','Bokadvira','Bokajan','Bokakhat','Bokaro Steel City','Bolpur','Bomdila','Bommanahalli','Bommasandra','Bommidi','Bongaigaon','Boparai','Borawar','Borgaon','Borivali West','Borsad','Botad','Brahmanagudem','Brahmapur','Bramhapuri','Budaun','Buguda','Bulandshahr','Buldana','Bundi','Burari','Burhanpur','Burla','Burnpur','Buxar','Byahatti','Calangute','Carambolim','Carmona','Chabua','Chagallu','Chakan','Chakdaha','Chalisgaon','Chalsa','Chamba','Champadanga','Champahati','Champdani','Chamrajnagar','Chandangaon','Chandannagar','Chandbali','Chandgad','Chandigarh','Chandkheda','Chandol','Chandori','Chandpara','Chandparsa','Chandpur','Chandrala','Chandrapur','Channahalli','Chanpatia','Chapra','Charadva','Charkhi Dadri','Chatra','Chatrapur','Chayalode','Chengalpattu','Chengannur','Chennai','Cherai','Cherpulassery','Cherthala','Chewar Pachhim','Cheyyar','Chhapi','Chhapra','Chhatarpur','Chhibramau','Chhindwara','Chhoti Sadri','Chicalim','Chidambaram','Chikhli','Chikmagalūr','Chilwa','Chinchali','Chinchinim','Chincholi','Chinna Salem','Chinnalapatti','Chintalapeta','Chintalapudi','Chintamani','Chiplun','Chirakkal','Chirala','Chitradurga','Chittaranjan','Chittaurgarh','Chittavaram','Chittoor','Chiyyaram','Chomu','Choolai','Chopda','Churachandpur','Churu','Civil Lines','Coimbatore','Colachel','Colva','Connaught Place','Contai','Coonoor','Cuddalore','Cumbum','Cuncolim','Curchorem','Curtorim','Cuttack','Dabra','Dabwali','Dad','Dadri','Dagshai','Dahanu','Dahegam','Dahegaon','Dakor','Dalla','Daman','Damoh','Danda','Dandeli','Dankaur','Dantan','Dapoli','Daranagar','Darbhanga','Dargamitta','Dariba','Dariyabad','Darjeeling','Darsi','Dasuya','Datawali','Datia','Daulatpur','Daund','Dausa','Davangere','Davorlim','Daxini Society','Debipur','Deesa','Degana','Dehli','Dela','Delhi','Deoband','Deogarh','Deoghar','Deoria','Desaiganj','Devadurga','Dewas','Dhaipai','Dhampur','Dhanaura','Dhanbad','Dhaniakhali','Dhansura','Dhar','Dharampur','Dharamsala','Dharapuram','Dharavi','Dhareru','Dhari','Dharmajigudem','Dharmanagar','Dharmapuri','Dharmavaram','Dharwad','Dhekiajuli','Dhemaji','Dhenkanal','Dhone','Dhoraji','Dhrangadhra','Dhrol','Dhubri','Dhule','Dhulian','Dhuri','Diamond Harbour','Dibrugarh','Didwana','Digboi','Digha','Dildarnagar','Dimapur','Dinanagar','Dindigul','Dinhata','Diphu','Dispur','Diu','Diva','Doda','Dombivali','Dona Paula','Dondaicha','Dubrajpur','Dudhathal','Dungarpur','Durgapur','Dwarka','Edakkara','Edappal','Edavilangu','Egattur','Egmore','Egra','Elavanur','Electronics City','Eluru','Enikepadu','Eranellur','Ernakulam','Erode','Etah','Etawah','Ettumanoor','Faizabad','Falakata','Falna','Faridabad','Faridkot','Farrukhabad','Fatehabad','Fatehgarh Churian','Fatehpur','Ferokh','Firozabad','Firozpur','Forbesganj','Gadag','Gadarwara','Gadhinglaj','Gaisilat','Gajraula','Gajsinghpur','Ganapavaram','Ganaur','Gandarbal','Gandevi','Gandhidham','Gandhinagar','Gangoh','Gangtok','Ganjam','Gannavaram','Gargoti','Garhdiwala','Garhshankar','Garividi','Garli','Gauriganj','Gaya','Ghansoli','Gharaunda','Ghatal','Ghaziabad','Ghazipur','Ghorawal','Ghosi','Ghumarwin','Gingee','Giridih','Goa','Goalpara','Gobichettipalayam','Godda','Godhra','Gogaon','Gohana','Gohpur','Gokak','Gola','Golaghat','Gollamudi','Gollapudi','Gonda','Gondal','Gondia','Gonikoppal','Gopalapuram','Gopalasamudram','Gopalganj','Gorakhpur','Goraya','Goregaon','Goregaon East','Gorubathan','Greater Noida','Gua','Gudipadu','Gudivada','Gudur','Guindy','Guirdolim','Gujrat','Gulbarga','Gumia','Guna','Gunadala','Gunduperumbedu','Guntakal','Guntur','Gurdaspur','Gurgaon','Guwahati','Gwalior','Gyanpur','Habra','Haflong','Hailakandi','Hajipur','Haldia','Hale Dharmapuri','Halisahar','Halol','Hamirpur','Hangal','Hansi','Hanumanganj','Hanumangarh','Hapur','Harchandpur','Harchowal','Hardoi','Harihar','Haripad','Haripal','Harippad','Harnaut','Harsora','Harur','Haryana','Hasanpur','Hasnabad','Hassan','Hathras','Haveri','Hazaribagh','Himatnagar','Hindaun','Hindmotor','Hindupur','Hinganghat','Hinjewadi','Hirakud','Hirebennūr','Hisar','Hisua','Hojai','Honnali','Hoodi','Hoshangabad','Hoshiarpur','Hoshiarpur Kalota','Hoskote','Hospet','Hosur','Howrah','Hridaypur','Hubli','Hukumpeta','Hunsur','Ichalkaranji','Ichapur','Idar','Idukki','Igatpuri','Ikauna','Ilkal','Imphal','Indapur','Indirapuram','Indore','Injambakkam','Irinjalakuda','Iritty','Islampur','Ismailabad','Itanagar','Itwa','Jabalpur','Jagadhri','Jaggayyapeta','Jagiroad','Jagraon','Jaipatna','Jaipur','Jaisalmer','Jaitaran','Jajpur','Jakhalabandha','Jalalabad','Jalandhar','Jalgaon','Jalna','Jalpaiguri','Jamai','Jambusar','Jammalamadugu','Jammu','Jamnagar','Jamshedpur','Janakpuri','Janephal','Jaora','Jaraka','Jari','Jasdan','Jath','Jaunpur','Jawad','Jejuri','Jetpur','Jeypore','Jhabua','Jhajjar','Jhalawar','Jhalod','Jhansi','Jhargram','Jharsuguda','Jhingran','Jiaganj','Jind','Jodhpur','Jorethang','Jorhat','Jowai','Junagadh','Kadannamanna','Kadapa','Kadi','Kadiri','Kaikalur','Kailashahar','Kair','Kaithal','Kakching','Kakdwip','Kakinada','Kakkanad','Kakkaveri','Kalahandi','Kalamasseri','Kalamboli','Kalamnuri','Kalavakkam','Kaliachak','Kalimpong','Kallambalam','Kallankattuvalasu','Kalna','Kalol','Kalpakkam','Kalpeni','Kalwan','Kalyan','Kalyani','Kamalpur','Kamrej','Kanadi','Kanchipuram','Kanchrapara','Kandi','Kandigai','Kandukur','Kangayam','Kanglatongbi','Kangra','Kanhan','Kanhangad','Kanigiri','Kankinara','Kannur','Kanodar','Kanpur','Kantapal','Kanuru','Kapadvanj','Kapasan','Kapurthala Town','Karad','Karadiya','Karaikal','Karaikudi','Karamsad','Karanjia','Karauli','Kareli','Kargani','Kargil','Karimganj','Karimpur','Karjat','Karkala','Karmala','Karnal','Karsog','Kartarpur','Karur','Karwar','Karwi','Kasaragod','Kasauli','Kasganj','Kathlal','Kathua','Katihar','Katpadi','Katra','Kattanam','Kattankulathur','Kavali','Kavaratti','Kavida','Kawant','Kayamkulam','Kazhakuttam','Kelambakkam','Kembhavi','Kesariya','Khadki','Khaga','Khagaria','Khaira Tola','Khajura','Khalilabad','Khambhaliya','Khambhat','Khamgaon','Khandagiri','Khandala','Khandsa','Khanna','Khanpur','Khapri','Kharagpur','Kharar','Kharghar','Khargone','Khatauli','Khed','Kheda','Kheralu','Khergam','Kheri','Khirajpur','Khodiyarnagar','Khopoli','Khowai','Khunti','Khurai','Khurja','Kilakadu','Kilakarai','Kiliyanur','Kilpauk','Kishanganj','Kishangarh','Kishtwar','Kochas','Kochi','Kodaikanal','Kodinar','Kodungallur','Kodur','Kohima','Kokrajhar','Kolaghat','Kolar','Kolaras','Kolathur','Kolenchery','Kolhapur','Kolkata','Kollam','Kommeri','Konaje','Konch','Kondotty','Konnagar','Kopargaon','Koppa','Koppal','Koraput','Korukonda','Kosamba','Kosli','Kot Kapura','Kota','Kotagiri','Kotancheri','Kothamangalam','Kothri','Kotkapura','Kotkasim','Kotla','Kotputli','Kottakkal','Kottarakara','Kottayam','Kottukal','Kotul','Kovilpatti','Kovvur','Kozhikode','Krishnagiri','Krishnanagar','Krishnarajapuram','Kuchaman','Kuchinda','Kudal','Kudupu','Kukshi','Kulgam','Kulti','Kumarghat','Kumbakonam','Kumbh','Kumbra','Kumta','Kumulam','Kunnamkulam','Kuppam','Kupwāra','Kurali','Kurla','Kurnool','Kurukshetra','Kushalnagar','Kusunda','Kutta','Kuttalam','Ladwa','Laitumkhrah','Lakhimpur','Lakhnadon','Lalganj','Lalgola','Lankam','Lasalgaon','Latipur','Latur','Limbdi','Limkheda','Lohardaga','Lokapur','Lonand','Lonar','Lonavla','Loutolim','Lucknow','Ludhiana','Lunglei','Machavaram','Machhiwara','Machilipatnam','Madanapalle','Madanapalli','Madavara','Maddur','Madgaon','Madhapar','Madhepura','Madhogarh','Madhubani','Madhupur','Madikeri','Madukkur','Madurai','Mahabaleshwar','Mahad','Mahalingpur','Maharajganj','Mahe','Mahemdavad','Mahendragarh','Mahesana','Maheshwar','Mahim','Mahipalpur','Mahishadal','Mahuva','Mahuwa','Mainaguri','Mainpuri','Makhu','Makkaraparamba','Makum','Mal Bazar','Mala','Malappuram','Malda','Malegaon','Maler Kotla','Malkapuram','Malvan','Mamit','Manali','Manauli','Manavadar','Manchar','Mandapeta','Mandi','Mandi Dabwali','Mandla','Mandsaur','Mandvi','Mandya','Mangalagiri','Mangaldai','Mangalore','Mangaon','Manipal','Manjeri','Mankada','Mannargudi','Manojipatti','Manor','Manpuri','Mansa','Mansarovar','Manteswar','Maradu','Markapur','Marthandam','Marungulam','Maruteru','Mathura','Matigara','Mattam','Mattathur','Mau','Maur','Mavelikara','Mayapur','Mayiladuthurai','Medarametla','Medininagar','Medinipur','Meerut','Memari','Memnagar','Mesra','Mettur','Mhasla','Mhow','Mira Road','Miraj','Mirzapur','Modasa','Moga','Mohali','Mohanlalganj','Mohanpur','Mokokchung','Mongam','Moradabad','Morena','Morigaon','Morshi','Morvi','Motihari','Mudgal','Mudhol','Mudittanendal','Mukerian','Mukkulam','Mulki','Mulund East','Mulund West','Mumbai','Mummidivaram','Mundamveli','Mundgod','Mundi','Mundra','Munger','Munnar','Murarai','Murshidabad','Murthal','Murud','Murwara','Muvattupuzha','Muzaffarnagar','Muzaffarpur','Mysore','Nabadwip','Nabha','Nadapuram','Nadaun','Nadbai','Nadiad','Nadwa','Nagapattinam','Nagaur','Nagda','Nagercoil','Nagina','Nagpur','Nagrakata','Nahan','Naharlagun','Najafgarh','Najibabad','Nakodar','Nalagarh','Nalbari','Nalhati','Naliya','Nallajerla','Nallamada','Namakkal','Namburu','Namchi','Nandambakkam','Nandasan','Nanded','Nandigama','Nandurbar','Nandyal','Nangal','Nanganallur','Naraingarh','Narasapuram','Narasaraopet','Narayanapuram','Narayangaon','Narela','Narkanda','Narkatiaganj','Narnaul','Narsapuram','Narsinghpur','Narsipatnam','Narwana','Nashik','Nasirabad','Nasrapur','Nathana','Nathdwara','Navapur','Navelim','Navsari','Nawada','Nawalgarh','Nazira','Nedumangad','Nedumbassery','Nedumkandam','Neem ka Thana','Neemrana','Nellikuppam','Nellimarla','Nellore','Nepanagar','Neral','New Delhi','Neyveli','Nidadavole','Nigdhu','Nilambur','Nilanga','Nileshwar','Nilokheri','Nimbahera','Nirjuli','Niwai','Nohar','Noida','North Lakhimpur','Nuapada','Nuh','Nurmahal','Nurpur','Nuvem','Nuzvid','Ochanthuruth','Ochira','Old Goa','Old Hubli','Ongole','Ooty','Orai','Osmanabad','Ottapalam','Ottappalam','Pachora','Padanilam','Paddhari','Padmanabhapuram','Padrauna','Pakur','Palakkad','Palakollu','Palampur','Palamu','Palani','Palanpur','Palazhi','Palghar','Pali','Palitana','Palwal','Panagarh','Panamaram','Panampilly Nagar','Panangattur','Panchkula','Pandharpur','Pandu','Pandua','Panipat','Panjim','Panvel','Paonta Sahib','Paradip','Paranur','Parappanangadi','Paravai','Parbhani','Pardi','Parli','Parola','Parra','Partur','Patan','Pataudi','Patdi','Pathanamthitta','Pathankot','Patharkandi','Pathsala','Patial','Patiala','Patna','Patran','Pattambi','Patti','Paud','Payyanur','Pedana','Peddapalli','Peelamedu','Pehowa','Pen','Perambalur','Peravurani','Perintalmanna','Perumbakkam','Perumbavoor','Perundurai','Petlad','Phagwara','Phalodi','Phalsund','Phaltan','Pilani','Pimpri-Chinchwad','Pindwara','Pinjar','Pisangan','Pithampur','Pithapuram','Podili','Pollachi','Ponda','Pongalur','Ponnani','Ponneri','Poranki','Porayar','Porbandar','Port Blair','Prabhadevi','Prantij','Pratapgarh','Proddatur','Puducherry','Pudukkottai','Pudupakkam','Puduvayal','Pulgaon','Pulwama','Punalur','Pundri','Pune','Puri','Purna','Purnea','Purnia','Puruliya','Pushkar','Puttaparthi','Puttur','Qadian','Radaur','Radhanpur','Raebareli','Raghunandanpur','Raghunathpur','Rahata','Rahimatpur','Rahuri','Raichur','Raiganj','Raikot','Raipur','Raisen','Raisinghnagar','Rajahmundry','Rajampeta','Rajgangpur','Rajgarh','Rajgir','Rajkot','Rajpura','Rajsamand','Ramabhadrapuram','Ramachandrapuram','Ramanathapuram','Ramapuram','Ramgarh','Ramnagar','Rampachodavaram','Rampur','Rampura Phul','Ramtek','Ranaghat','Ranavav','Ranchi','Rangia','Rangpo','Ranibennur','Raniganj','Ranip','Rapar','Rasipuram','Rasulpur Rohta','Ratangarh','Ratia','Ratlam','Ratnagiri','Raurkela','Ravulapalem','Rawatbhata','Raxaul','Rayagada','Razole','Renapur','Renigunta','Renukoot','Repalle','Rewa','Rewari','Rishra','Risod','Robertsganj','Roha','Rohru','Rohta','Rohtak','Roing','Rompicherla','Ropar','Rowta','Rudauli','Rupnagar','Sabang','Sadhaura','Sadri','Safidon','Sagar','Sagbara','Saharanpur','Saharsa','Sahibabad','Sahibganj','Sainthia','Sakroda','Saktipur','Sakur','Saleha','Salem','Saligao','Salt Lake City','Samalkot','Samana','Samastipur','Samba','Sambalpur','Sambhal','Sampla','Sanand','Sancoale','Sangamner','Sangaria','Sangat Kalan','Sangli','Sangrur','Sanguem','Sankarankovil','Saphale','Sapotra','Sarabe','Sardarshahr','Sardulgarh','Sarola Kalan','Sasaram','Satara','Sathyamangalam','Satna','Sattur','Savanur','Savarkundla','Savda','Sawai Madhopur','Sawantwadi','Sehore','Sendhwa','Seoni','Serampore','Shahabad','Shahada','Shahapur','Shahdara','Shahdol','Shahganj','Shahjahanpur','Shahpur','Shamli','Shamshi','Shantipur','Shenoy Nagar','Sheoganj','Sheohar','Shevgaon','Shillong','Shimla','Shimoga','Shirali','Shirdi','Shirol','Shirwal','Sholinghur','Shoranur','Shorapur','Shrigonda','Shyamnagar','Sibsagar','Sidlaghatta','Sihora','Sikar','Silchar','Siliguri','Sillod','Silvassa','Simaluguri','Sindewahi','Sindkheda','Singarayakonda','Singrauli','Singtam','Sinnar','Sinor','Sion','Sirathu','Sirhind','Sirohi','Sironcha','Sirsa','Sirsi','Siruseri','Sitamarhi','Sitapur','Siuri','Sivaganga','Sivakasi','Siwan','Sohagpur','Sohna','Sojat','Solan','Solapur','Somvarpet','Sonamukhi','Sonari','Sonbarsa Raj','Sonepur','Songadh','Sonipat','Sonitpur','Soreng','Srikakulam','Srikalahasti','Srinagar','Sringeri','Sriperumbudur','Sujangarh','Sukhpur','Sullia','Sultanpur','Sunabeda','Sunam','Sundargarh','Supaul','Surajgarh','Surat','Suratgarh','Surendranagar','Susner','Suwasra','Swarupnagar','Tabiji','Tajnipur','Talab Tillo','Talaja','Talcher','Talegaon Dabhade','Taliparamba','Talwara','Talwas','Tambaram','Tamluk','Tanda','Tanuku','Taoru','Tapan','Tarakeswar','Tarn Taran','Tarwara','Tekkali','Tekkatte','Tellicherry','Tezpur','Thane','Thanjavur','Thenali','Theni','Theog','Thiruthuraipoondi','Thiruvarur','Thodupuzha','Thoothukudi','Thoubal','Thrissur','Tihu','Timarni','Tinsukia','Tiptur','Tiruchchendur','Tiruchengode','Tiruchi','Tirumala - Tirupati','Tirunelveli','Tirupattur','Tirupur','Tirur','Tirurangadi','Tiruvalla','Tiruvallur','Tiruvannamalai','Tiruvengadam','Todabhim','Tohana','Tonk','Torpa','Trivandrum','Tulihal','Tulshipur','Tumkūr','Turekela','Udaipur','Udaipurwati','Udalguri','Udhampur','Udupi','Ujjain','Ulhasnagar','Ulundurpet','Umbraj','Umred','Umreth','Una','Undi','Unjha','Unnao','Uran','Usgao','Usilampatti','Uttarpara','Vada','Vadapalani','Vadgam','Vadodara','Vagator','Vaishali Nagar','Vallioor','Valluvambram','Valsad','Vapi','Varanasi','Varangaon','Varca','Varkala','Vasai','Vasco da Gama','Vayalar','Vazhuthacaud','Velacheri','Vellore','Velpuru','Venmony','Veraval','Verna','Vidisha','Vijayawada','Villivakkam','Villupuram','Vinukonda','Viramgam','Virar','Virpur','Virudhachalam','Visakhapatnam','Visavadar','Visnagar','Vita','Vizianagaram','Vriddhachalam','Vrindavan','Vuyyuru','Vyara','Vyttila','Wada','Wadwani','Waghai','Walajapet','Wardha','Washim','Weir','Wokha','Worli','Yamunanagar','Yanam','Yavatmal','Yeola','Yerwada','Yeshwanthpur','Zira','Zirapur'];
                                    @endphp
                                    <select class="form-control select2" multiple="" name="influencer_locations[]" required>
                                      @foreach($locations as $one)
                                      <option value="{{$one}}" @if(in_array($one, $location_arr)) selected="selected" @endif >{{$one}}</option> @endforeach                                     
                                    </select>
                                </div>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">

                          <label class="col-md-4 text-md-right text-left mt-2">Influencer Gender*</label>
                          <div class="col-lg-6 col-md-8">
                            <div class="selectgroup w-100">
                              <label class="selectgroup-item">
                                <input type="radio" name="influencer_gender" value="female" class="selectgroup-input" @if(isset($campaign) && !empty($campaign)) {{ $campaign->influencer_gender == 'female' ? 'checked="checked"' : ''}} @endif required>
                                <span class="selectgroup-button">Female</span>
                              </label>
                              <label class="selectgroup-item">
                                <input type="radio" name="influencer_gender" value="male" class="selectgroup-input" @if(isset($campaign) && !empty($campaign)) {{ $campaign->influencer_gender == 'male' ? 'checked="checked"' : ''}} @endif required>
                                <span class="selectgroup-button">Male</span>
                              </label>
                              <label class="selectgroup-item">
                                <input type="radio" name="influencer_gender" value="any" class="selectgroup-input" @if(isset($campaign) && !empty($campaign)) {{ $campaign->influencer_gender == 'any' ? 'checked="checked"' : ''}} @endif required>
                                <span class="selectgroup-button">Any</span>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-4 text-md-right text-left mt-2">Type of influencers*</label>
                          @php
                            $types_arr = [];
                            if(isset($campaign) && !empty($campaign)){
                              if($campaign->types()->count()){
                                $types_arr = array_column($campaign->types->toArray(), 'type');  
                              }
                            }
                          @endphp
                          <div class="col-lg-6 col-md-8">
                            <div class="selectgroup w-100">
                              <label class="selectgroup-item">
                                <input type="checkbox" name="influencer_type[]" value="nano" class="selectgroup-input"  @if(isset($campaign) && !empty($campaign)) {{ in_array('nano', $types_arr) ? 'checked="checked"' : ''}} @endif required>
                                <span class="selectgroup-button">Nano (2K - 10K)</span>
                              </label>
                              <label class="selectgroup-item">
                                <input type="checkbox" name="influencer_type[]" value="micro" class="selectgroup-input" @if(isset($campaign) && !empty($campaign)) {{ in_array('micro', $types_arr) ? 'checked="checked"' : ''}} @endif required>
                                <span class="selectgroup-button">Micro (10K - 50K)</span>
                              </label>
                              <label class="selectgroup-item">
                                <input type="checkbox" name="influencer_type[]" value="macro" class="selectgroup-input" @if(isset($campaign) && !empty($campaign)) {{ in_array('macro', $types_arr) ? 'checked="checked"' : ''}} @endif required>
                                <span class="selectgroup-button">Macro (50K - 500K)</span>
                              </label>
                              </div>
                          </div>
                          <label class="col-md-4 text-md-right text-left mt-2"></label>
                          <div class="col-lg-6 col-md-8">
                            <div class="selectgroup w-100">
                              <label class="selectgroup-item">
                                <input type="checkbox" name="influencer_type[]" value="mega" class="selectgroup-input" @if(isset($campaign) && !empty($campaign)) {{ in_array('mega', $types_arr) ? 'checked="checked"' : ''}} @endif required>
                                <span class="selectgroup-button">Mega (500K - 1M)</span>
                              </label>
                              <label class="selectgroup-item">
                                <input type="checkbox" name="influencer_type[]" value="celeb" class="selectgroup-input" @if(isset($campaign) && !empty($campaign)) {{ in_array('celeb', $types_arr) ? 'checked="checked"' : ''}} @endif required>
                                <span class="selectgroup-button">Celeb (1M+)</span>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row align-items-center" id="link-html">
                          <input type="hidden" name="status" id="form-status" value="">
                          @if(isset($campaign) && !empty($campaign))
                            @if($campaign->referenceLinks()->count() > 0)
                              @foreach($campaign->referenceLinks as $key => $arr)
                              <label class="col-md-4 text-md-right text-left">@if($key == 0) Reference links @endif</label>
                              <div class="col-lg-6 col-md-8">
                                <input type="text" name="reference_links[]" value="{{$arr->link}}" class="form-control">
                              </div>
                              @endforeach
                            @else
                              <label class="col-md-4 text-md-right text-left">Reference links</label>
                              <div class="col-lg-6 col-md-8">
                                <input type="text" name="reference_links[]" value="" class="form-control">
                              </div>

                            @endif
                          @else
                              <label class="col-md-4 text-md-right text-left">Reference links</label>
                              <div class="col-lg-6 col-md-8">
                                <input type="text" name="reference_links[]" value="" class="form-control">
                              </div>
                          @endif
                        </div>
                        
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-left"><button onclick="addLink()" type="button" class="btn btn-xs">Add link</button></label>
                          <!-- <div class="col-lg-6 col-md-8 mt-2"> -->
                            <!-- <button class="btn btn-xs">Add link</button> -->
                        </div>
                        <div class="form-group row align-items-center">
                           <label class="col-md-4 text-md-right text-left">If Selected influencers </label>
                              <div class="col-lg-6 col-md-8">
                                <div class="custom-file">
                                  <input type="file" name="image" class="custom-file-input" id="customFile">
                                  <label class="custom-file-label" for="customFile">Upload file (xlsx,csv)*</label>
                                </div>
                              </div>
                        </div>
                       <!-- <div class="form-group row">
                          <div class="col-md-4"></div>
                          <div class="col-lg-4 col-md-6">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                              <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                            </div>
                          </div>
                        </div> -->
                        <div class="form-group row" id="buttons">
                          <div class="col-md-4"></div>
                          <div class="col-lg-4 col-md-6 text-right">
                            
                            <button type="button" value="save" class="btn btn-icon icon-right btn-primary" onclick="formSubmit('save')">Save <i class="fas fa-save"></i></button>
                            <button type="button" value="post" class="btn btn-icon icon-right btn-primary" onclick="formSubmit('post')">Post <i class="fas fa-envelope"></i></button>
                          </div>
                        </div>
                        <div class="form-group row" id="loading" style="display:none;" >
                          <div class="col-md-4"></div>
                          <div class="col-lg-4 col-md-6 text-right">
                            <div class="progress">
                              <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

@endsection

@section('scripts')
  @parent
  <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/summernote/summernote-bs4.js' }}"></script>
  <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/codemirror/lib/codemirror.js' }}"></script>
  <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/codemirror/mode/javascript/javascript.js' }}"></script>
  <!-- <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/jquery-selectric/jquery.selectric.min.js' }}"></script> -->
  <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/select2/dist/js/select2.full.min.js' }}"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
  <script>
    $(document).ready(function() {
      // $('.datepicker').datepicker({
      //   autoclose: true,
      //   startDate: new Date(),
      // });

       $(function() {
         $("input:file").change(function (){
           var fileName = $(this).val();
           $(".custom-file-label").html(fileName);
         });
      });

    });
    function addLink(){
      html = '<label class="col-md-4 text-md-right text-left mt-1"></label><div class="col-lg-6 col-md-8 mt-1">\
              <input type="text" name="reference_links[]" value="" class="form-control">\
            </div>';
      $("#link-html").append(html);
      return;
    }

    function formSubmit(status) {
      $("#form-status").val(status);
      $("#buttons").hide();
      $("#loading").show();
      $("#form").submit();
    }

  </script>
@endsection

