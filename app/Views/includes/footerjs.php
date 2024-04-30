<?php 
$this->db = \Config\Database::connect();
?>
<!--<script src="<?php echo base_url('front/assets/js/jquery-3.6.0.min.js') ?>"></script>-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="<?php echo base_url('front/assets/js/jquery-ui.js') ?>"></script>
	<script src="<?php echo base_url('front/assets/js/bootstrap.bundle.min.js') ?>"></script>
	<script src="<?php echo base_url('front/assets/js/swiper-bundle.min.js') ?>"></script>
	<script src="<?php echo base_url('front/assets/js/jquery.fancybox.min.js') ?>"></script>
	<script src="<?php echo base_url('front/assets/js/slick.js') ?>"></script>
	<script src="<?php echo base_url('front/assets/js/summernote.min.js') ?>"></script>
	<script src="<?php echo base_url('front/assets/js/jquery.waypoints.min.js') ?>"></script>
	<script src="<?php echo base_url('front/assets/js/counterup.js') ?>"></script>
	<script src="<?php echo base_url('front/assets/js/select2.min.js') ?>"></script>
	<script src="<?php echo base_url('front/assets/js/viewport.jquery.js') ?>"></script>
	<script src="<?php echo base_url('front/assets/js/jquery.nice-number.min.js') ?>"></script>
	<script src="<?php echo base_url('front/assets/js/main.js') ?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  


    <script>
        // Initialize Select2
        $(document).ready(function() {
            // $('.custom-select').select2();
            $('.js-example-basic-single').select2();
        });
    </script>
	
	<script>
    function wishlistform(jobId, userId) {
        $("#wishbtn_" + jobId).html('<i class="fa fa-spinner"></i>');
        $.ajax({
            url: "<?php echo base_url('/jobs-save-by-user')?>",
            type: 'POST',
            data: {"JobID": jobId, "userId": userId},
            success: function(result) {
                if (result.status == 200) {
                    $("#wishbtn_" + jobId).html('<i class="bi bi-bookmark-heart"></i>');
                    $("#wishbtn_" + jobId).css('background', '#70d100');
                    toastr.success(result.msg);
                } else {
                    $("#wishbtn_" + jobId).html('<i class="bi bi-bookmark"></i>');
                    toastr.info(result.msg);
                }
            },
            error: function(data) {
                console.log(data);
            }
        });
    }
</script>


<script>
// 		Slider category
		/*$('.cat-slider').owlCarousel({
			loop: true,
			margin: 10,
			nav: true,
			dots: false,
			autoWidth: true,
			autoplay: true,
			slideTransition: 'linear',
			autoplayTimeout: 2000,
			autoplaySpeed: 2000,
			autoplayHoverPause: true,
			responsive: {
				0: {
					items: 2
				},
				600: {
					items: 3
				},
				1000: {
					items: 6
				}
			}
		})*/
		
		 $(document).ready(function(){
        $('.cat-slider').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            autoWidth: true,
            autoplay: true,
            slideTransition: 'linear',
            autoplayTimeout: 2000,
            autoplaySpeed: 2000,
            autoplayHoverPause: true,
            responsive: {
                0: { items: 2 },
                600: { items: 3 },
                1000: { items: 6 }
            }
        });
    });
// 		Show all Category
		$('.moreless-button').click(function() {
			$('.moretext').slideToggle();
			if($('.moreless-button').text() == "Show All") {
				$(this).text("Show Less")
			} else {
				$(this).text("Show All")
			}
		});
// 		Show all Job
		$('.moreless-button1').click(function() {
			$('.moretext1').slideToggle();
			if($('.moreless-button').text() == "Show All") {
				$(this).text("Show Less")
			} else {
				$(this).text("Show All")
			}
		});
// 		Counter
		$(document).ready(function() {
			$('.odometer').each(function() {
				$(this).prop('Counter', 0).animate({
					Counter: $(this).text()
				}, {
					duration: 3500, 
					easing: 'swing',
					step: function(now) {
						$(this).text(Math.ceil(now));
					}
				});
			});
		});
		</script>
		
		
<script>
    var citystate = [
        <?php
        $cityStateQuery = $this->db->table('location_cities')
            ->select('location_cities.name AS cityName, location_states.name AS stateName')
            ->join('location_states', 'location_cities.state_id = location_states.id')
            ->get();
        
        $cityStateArray = $cityStateQuery->getResultArray();
        
        foreach ($cityStateArray as $row) {
            echo '"' . $row['cityName'] . ', ' . $row['stateName'] . '",';
        }
        ?>
    ];

    autocomplete(document.getElementById("location"), citystate);

    $(function() {
        $('#location').keydown(function (e) {
            if (e.ctrlKey || e.altKey) {
                e.preventDefault();
            } else {
                var key = e.keyCode;
                if (!((key == 9) || (key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                    e.preventDefault();
                }
            }
        });
    });

    function autocomplete(inp, arr) {
        var currentFocus;

        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;
            closeAllLists();
            if (!val) { return false; }
            currentFocus = -1;

            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            this.parentNode.appendChild(a);

            for (i = 0; i < arr.length; i++) {
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    b = document.createElement("DIV");
                    b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                    b.innerHTML += arr[i].substr(val.length);
                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                    b.addEventListener("click", function(e) {
                        inp.value = this.getElementsByTagName("input")[0].value;
                        closeAllLists();
                    });
                    a.appendChild(b);
                }
            }
        });

        document.getElementById('location').onblur = function() {
            var flag = false;
            for (var k in citystate) {
                if ($('#location').val().toLowerCase() === citystate[k].toLowerCase()) {
                    flag = true;
                    $('#location').val(camelize($('#location').val().toLowerCase()));
                }
            }
            if (!flag) {
                $('#location').val('');
            }
        };

        inp.addEventListener("focus", function(e) {
            var a, b, i, val = "";
            closeAllLists();
            if (!val) { return false; }
            currentFocus = -1;

            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            this.parentNode.appendChild(a);

            for (i = 0; i < arr.length; i++) {
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    b = document.createElement("DIV");
                    b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                    b.innerHTML += arr[i].substr(val.length);
                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                    b.addEventListener("click", function(e) {
                        inp.value = this.getElementsByTagName("input")[0].value;
                        closeAllLists();
                    });
                    a.appendChild(b);
                }
            }
        });

        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                currentFocus++;
                addActive(x);
            } else if (e.keyCode == 38) {
                currentFocus--;
                addActive(x);
            } else if (e.keyCode == 13) {
                e.preventDefault();
                if (currentFocus > -1) {
                    if (x) x[currentFocus].click();
                }
            }
        });

        function addActive(x) {
            if (!x) return false;
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            x[currentFocus].classList.add("autocomplete-active");
        }

        function removeActive(x) {
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }

        function closeAllLists(elmnt) {
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
    }

    function camelize(str) {
        return str.replace(/(?:^\w|[A-Z]|\b\w)/g, function(word, index) {
            return index === 0 ? word.toLowerCase() : word.toUpperCase();
        }).replace(/\s+/g, '');
    }
</script>
