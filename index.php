<?php
session_start(); // Start the session

// Check if the user is logged in, redirect to login page if not logged in
function checkLoggedIn()
{
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php"); // Redirect to login page
        exit();
    }
}

// Call checkLoggedIn() on restricted pages to enforce authentication
checkLoggedIn();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tutor Hub</title>

    <?php require('inc/links.php'); ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <style>
        .Availability-form {
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }



        @media screen and (max-width: 575px) {
            .Availability-form {
                margin-top: 50px;
                margin-top: 0;
                padding: 25px 35px;



            }


        }


        .profile-dropdown-content a {
            display: block;
            /* Display each item on a new line */
            padding: 10px 12px;
            text-decoration: none;
            color: #333;
        }

        .profile-dropdown-content a:hover {
            background-color: #ddd;
        }

        /* Show the dropdown on hover */
        .profile-dropdown:hover .profile-dropdown-content {
            display: block;
        }

        .logo-img {
            width: 172px;
            /* Adjust the width as needed */
            height: 50px;
            /* Maintain aspect ratio */
            /* Add more styles as needed */
        }


        .profile-dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            max-width: 200px;
            /* Set a maximum width for the dropdown */
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            right: 0;
            /* Position the dropdown to the right */
            top: 100%;
            /* Position it just below the logo */
            cursor: pointer;
        }

        /* Rest of your CSS code remains the same */
        /* Style for the flex container */
        .select-container {
            display: flex;
            align-items: center;
        }

        /* Quiz Section Styles */

        .quiz-container {
            background-color: #f7f7f7;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .quiz-container h2 {
            font-size: 24px;
            margin-bottom: 15px;
            color: #333;
        }

        .quiz-question {
            margin-bottom: 15px;
        }

        .quiz-question label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .quiz-question input[type="radio"] {
            margin-right: 8px;
        }

        .quiz-submit-btn {
            background-color: #4caf50;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .quiz-submit-btn:hover {
            background-color: #45a049;
        }


        .select-input {
            width: 100%;
            padding: 8px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .search-button {
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 8px 16px;
            cursor: pointer;
        }

        .search-button:hover {
            background-color: #0056b3;
        }

        /* Style for the coin balance container */
        .coin-balance {
            display: flex;
            align-items: center;
            font-size: 18px;
            font-weight: bold;
            color: #FFD700;
            /* Coin color (use the color you prefer) */
        }

        /* Style for the coin icon */
        .coin-icon {
            margin-right: 5px;
            font-size: 19px;
            /* Adjust the size as needed */
            cursor: pointer;
        }

        /* Style for the coin balance amount */
        .balance {
            font-size: 24px;
            /* Adjust the size as needed */
            color: #333;
            /* Text color (use the color you prefer) */
            cursor: pointer;
        }


        .star-rating {
            display: inline-block;
            font-size: 24px;

        }

        .star-rating input[type="radio"] {
            display: none;
        }

        .star-rating label {
            cursor: pointer;
            color: #ccc;
            transition: color 0.2s;
        }

        .star-rating input[type="radio"]+label::before {
            content: '\2606';
            /* Empty star character */
        }

        .star-rating input[type="radio"]:checked+label::before,
        .star-rating input[type="radio"]:checked+label~input[type="radio"]+label::before {
            content: '\2605';
            /* Filled star character */
            color: #FFD700;
            /* Selected star color */
        }



        /* Styling for the Video Container */
        .video-container {
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        <>

        /* Add styles for the feedback form */
        #feedback-form {
            margin-top: 20px;
        }

        #feedback {
            resize: vertical;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        main {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1,
        h2 {
            border-bottom: 1px solid #333;
            padding-bottom: 10px;
        }

        #paper-list {
            list-style: none;
            padding: 0;
        }

        #paper-list li {
            margin-bottom: 10px;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>


<body class="bg-light">

    <?php require 'inc/header.php'; ?>




    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container" style="height: 500px;">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <img src="inc/p1 (1).jpg" class="  w-100 d-block " />
                </div>
                <div class="swiper-slide">
                    <img src="inc/p1 (2).jpg" class=" w-100 d-block " />
                </div>
                <div class="swiper-slide">
                    <img src="inc/p1 (7).jpg" class=" w-100 d-block " />
                </div>
                <div class="swiper-slide">
                    <img src="inc/p1 (5).jpg" class=" w-100  d-block " />
                </div>
                <div class="swiper-slide">
                    <img src="inc/p1 (4).jpg" class=" w-100 d-block " />
                </div>


            </div>
        </div>

    </div>



    <div class="container Availability-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h5 class="mb-0">Select Branch</h5>
                        <div class="select-container">
                            <select id="branchSelect" class="select-input">
                                <option value="" disabled selected>Select Branch</option>
                                <option value="branch2">Computer Science</option>
                                <option value="branch3">Mechanical Science</option>
                                <option value="branch4">UPSC</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <h5 class="mb-0">Select Subject</h5>
                        <div class="select-container">
                            <select id="subjectSelect" class="select-input" disabled>
                                <option value="" disabled selected>Select Subject</option>
                                <!-- Options will be dynamically populated here -->
                            </select>
                        </div>
                    </div>
                    <div>
                        <h5 class="mb-0">Select Topic</h5>
                        <div class="select-container">
                            <select id="topicSelect" class="select-input" disabled>
                                <option value="" disabled selected>Select Topic</option>
                                <!-- Options will be dynamically populated here -->
                            </select>
                            <button class="search-button" onclick="playSelectedVideo()">Search</button>

                        </div>
                    </div>
                </div>













            </div>
        </div>

    </div>

    <br>
    <br>
    <div class="container Availability-form">
        <div class="row">
            <!-- Column for Video Player -->
            <div class="col-lg-8 col-md-8">
                <div class="video-container">
                    <div id="videoPlayerContainer" style="display: none;">
                        <iframe id="videoPlayer" width="100%" height="315" src="" frameborder="0"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>

            <!-- Column for Quiz Section -->
            <div class="col-lg-4 col-md-4">
                <!-- Quiz Container -->
                <div class="quiz-container">
                    <!-- Your quiz content goes here -->
                    <h2>Quiz Section</h2>
                    <p>This is where your quiz will be placed.</p>
                    <div class="quiz-question" id="question-container">
                        <h3>Question:</h3>
                        <p id="question"></p>
                        <form id="quiz-form">
                            <input type="radio" name="answer" id="option1" value="option1">
                            <label for="option1" id="label1"></label><br>
                            <input type="radio" name="answer" id="option2" value="option2">
                            <label for="option2" id="label2"></label><br>
                            <input type="radio" name="answer" id="option3" value="option3">
                            <label for="option3" id="label3"></label><br>
                            <button type="submit" id="submit">Submit</button>
                        </form>
                        <p id="result"></p>
                    </div>

                </div>
            </div>
        </div>
    </div>







    <section id="courses">
        <h2 class="mt-5 pt-5 mb-4 text-center fw-bold h-font"> Our Course</h2>

        <div class="container">


            <div class="row">
                <div class="col-lg-4 col-md-6 my-3">
                    <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                        <img src="inc/l (2).jpg" class="card-img-top">
                        <div class="card-body">
                            <h5>DBMS</h5>
                            <h6 class="mb-4">Course Price</h6>
                            <div class="features mb-4">
                                <h6 class="mb-1">Course Features</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Feature 1
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Feature 2
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Feature 3
                                </span>
                                <!-- Add more features as needed -->
                            </div>
                            <div class="facilities mb-4">
                                <h6 class="mb-1">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Facility 1
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Facility 2
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Facility 3
                                </span>
                                <!-- Add more facilities as needed -->
                            </div>
                            <div class="rating mb-4">
                                <h6 class="mb-1">Rating</h6>
                                <span class="badge rounded-pill bg-light">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </span>
                            </div>
                            <div class="d-flex justify-content-evenly mb-2">
                                <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Enroll Now</a>
                                <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Course Details</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-6 my-3">
                    <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                        <img src="inc/l (1).jpg" class="card-img-top">
                        <div class="card-body">
                            <h5>Web Development</h5>
                            <h6 class="mb-4">Course Price</h6>
                            <div class="features mb-4">
                                <h6 class="mb-1">Course Features</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Feature 1
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Feature 2
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Feature 3
                                </span>
                                <!-- Add more features as needed -->
                            </div>
                            <div class="facilities mb-4">
                                <h6 class="mb-1">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Facility 1
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Facility 2
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Facility 3
                                </span>
                                <!-- Add more facilities as needed -->
                            </div>
                            <div class="rating mb-4">
                                <h6 class="mb-1">Rating</h6>
                                <span class="badge rounded-pill bg-light">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </span>
                            </div>
                            <div class="d-flex justify-content-evenly mb-2">
                                <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Enroll Now</a>
                                <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Course Details</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-6 my-3">
                    <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                        <img src="inc/l (3).jpg" class="card-img-top">
                        <div class="card-body">
                            <h5>Data Structure And Algorithms</h5>
                            <h6 class="mb-4">Course Price</h6>
                            <div class="features mb-4">
                                <h6 class="mb-1">Course Features</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Feature 1
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Feature 2
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Feature 3
                                </span>
                                <!-- Add more features as needed -->
                            </div>
                            <div class="facilities mb-4">
                                <h6 class="mb-1">Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Facility 1
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Facility 2
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Facility 3
                                </span>
                                <!-- Add more facilities as needed -->
                            </div>
                            <div class="rating mb-4">
                                <h6 class="mb-1">Rating</h6>
                                <span class="badge rounded-pill bg-light">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                </span>
                            </div>
                            <div class="d-flex justify-content-evenly mb-2">
                                <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Enroll Now</a>
                                <a href="#" class="btn btn-sm btn-outline-dark shadow-none">Course Details</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-12 text-center mt-5">
                <a href="# " class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none"> More Course>></a>
            </div>
            </a></li>

            <section id="reach">
                <!-- Your courses content goes here -->
                <div>

                    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font"> Reach Us</h2>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 p-4  mb-lg-0 mb-3  bg-white rounded">
                                <iframe class="w-100 rounded" height="320px"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d28237.5587266168!2d77.43927835!3d27.7883754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39733c4391429d3f%3A0xd8331e2be037ee49!2sKosi%20Kalan%2C%20Uttar%20Pradesh%20281403!5e0!3m2!1sen!2sin!4v1687507337430!5m2!1sen!2sin"
                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="bg-white p-4 rounded mb-4">
                                    <h5>Call Us</h5>
                                    <a href="tel: +918445621552"
                                        class="d-inline-block mb-2 text-decoration-none text-dark">
                                        <i class="bi bi-telephone-fill"></i> +918445621552</a>
                                    <br>
                                    <a href="tel: +918445621552"
                                        class="d-inline-block mb-2 text-decoration-none text-dark">
                                        <i class="bi bi-telephone-fill"></i> +918445621552</a>
                                </div>
                                <div class="bg-white p-4 rounded mb-4">
                                    <h5>Follow Us</h5>
                                    <a href="#" class="d-inline-block mb-2 text-decoration-none text-dark">
                                        <span class="badge bg-light text-dark fs-6 p-2"> <i
                                                class="bi bi-twitter me-1"></i>
                                            Twitter</span>
                                    </a>
                                    <a href="#" class="d-inline-block mb-2 text-decoration-none text-dark">
                                        <span class="badge bg-light text-dark fs-6 p-2"> <i
                                                class="bi bi-instagram me-1"></i>
                                            Instagram</span>
                                    </a>
                                    <a href="#" class="d-inline-block mb-2 text-decoration-none text-dark">
                                        <span class="badge bg-light text-dark fs-6 p-2"> <i
                                                class="bi bi-Facebook me-1"></i>
                                            Facebook</span>
                                    </a>
                                    <br>
                                    <a href="tel: +918445621552"
                                        class="d-inline-block mb-2 text-decoration-none text-dark">
                                        <i class="bi bi-telephone-fill"></i> +918445621552</a>


                                </div>




                            </div>
                        </div>
            </section>



            <?php require('inc/footer.php'); ?>


            <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
            <script>
                var swiper = new Swiper(".swiper-container", {
                    spaceBetween: 30,
                    effect: "fade",
                    loop: true,
                    autoplay: {
                        delay: 3500,
                        disableOnInteraction: false
                    }
                });

                var dropdownVisible = false;
                var logoClicked = false;

                // Function to toggle the dropdown when clicking the logo
                function toggleDropdown() {
                    var dropdown = document.getElementById('profileDropdown');
                    if (dropdownVisible) {
                        dropdown.style.display = 'none';
                        dropdownVisible = false;
                    } else {
                        dropdown.style.display = 'block';
                        dropdownVisible = true;
                    }
                    logoClicked = true;
                }

                // Add an event listener to the document body for clicks
                document.body.addEventListener('click', function (event) {
                    if (!logoClicked && dropdownVisible) {
                        var dropdown = document.getElementById('profileDropdown');
                        dropdown.style.display = 'none';
                        dropdownVisible = false;
                    }
                    logoClicked = false;
                });

                // Add your other dropdown-related functions here (e.g., goToProfile, goToAboutUs, giveFeedback, logout)
                function goToProfile() {
                    // Add code to navigate to the user's profile page
                    alert("Navigating to Profile Page");
                }

                function goToAboutUs() {
                    // Add code to navigate to the About Us page
                    alert("Navigating to About Us Page");
                }

                function giveFeedback() {
                    // Add code to open a feedback form or navigate to the feedback page
                    alert("Opening Feedback Form");
                }



                const branchSelect = document.getElementById('branchSelect');
                const subjectSelect = document.getElementById('subjectSelect');
                const topicSelect = document.getElementById('topicSelect');

                const subjectsByBranch = {
                    branch2: ['DSA', 'Full Stack', 'DBMS', 'Computer Network', 'Micro Processor', 'Computer Organization'],
                    branch3: ['Solid Mechanics', 'Engineering Thermodhynamics', 'Engineering Material and Metallurgy'],
                    branch4: ['css', 'Engineering Thermodhynamics', 'Engineering Material and Metallurgy'],

                };

                const topicsBySubject = {
                    'DSA': ['Array', 'String', 'Tree', 'Graph', ''],
                    'Full Stack': ['HTML', 'CSS', 'JavaScript'],
                    'DBMS': ['My SQL', 'Relational ALgebra', 'Normalization'],
                    'Computer Network': ['IntroductionOfCN', 'Flow Contral', 'Access Comtrol', 'CSMA/CD', 'Switching', 'Error Detection', 'IP Addressing'],
                    'Solid Mechanics': ['Topic 13', 'Topic 14', 'Topic 15'],
                    'Subject Z': ['Topic 16', 'Topic 17', 'Topic 18'],
                };

                // Function to populate subjects based on the selected branch
                function populateSubjects() {
                    const selectedBranch = branchSelect.value;
                    const subjects = subjectsByBranch[selectedBranch] || [];

                    // Clear existing options and enable the subject select
                    subjectSelect.innerHTML = '';
                    subjectSelect.disabled = subjects.length === 0;

                    // Populate subjects
                    subjects.forEach(subject => {
                        const option = document.createElement('option');
                        option.value = subject;
                        option.textContent = subject;
                        subjectSelect.appendChild(option);
                    });

                    // Clear and disable the topic select
                    topicSelect.innerHTML = '';
                    topicSelect.disabled = true;
                }

                // Function to populate topics based on the selected subject
                function populateTopics() {
                    const selectedSubject = subjectSelect.value;
                    const topics = topicsBySubject[selectedSubject] || [];

                    // Clear existing options and enable the topic select
                    topicSelect.innerHTML = '';
                    topicSelect.disabled = topics.length === 0;

                    // Populate topics
                    topics.forEach(topic => {
                        const option = document.createElement('option');
                        option.value = topic;
                        option.textContent = topic;
                        topicSelect.appendChild(option);
                    });
                }

                // Event listeners to trigger dynamic population
                branchSelect.addEventListener('change', populateSubjects);
                subjectSelect.addEventListener('change', populateTopics);

                // Initial population when the page loads
                populateSubjects();
                populateTopics();

                // JavaScript to handle video and rating system

                // ... your existing code ...

                function playSelectedVideo() {
                    const topicSelect = document.getElementById("topicSelect");
                    const selectedTopic = topicSelect.value;

                    // You should have a mapping of topics to YouTube video IDs
                    const topicToVideoMap = {
                        HTML: "HcOc7P5BMi4",
                        CSS: "ESnrn1kAD4E?si=_5LwpsTU3sQP6yiL",
                        JavaScript: "B7wHpNUUT4Y?si=7_WCeFcdu6ihErk7",
                        Array: "NTHVTY6w2Co?si=litBncqfsyra3kxx",
                        String: "vCRD36bG8xQ?si=czp_zD94mx8SFCjL",
                        Tree: "-DzowlcaUmE?si=Gk2H_kwEYt96BG2J",
                        Graph: "59fUtYYz7ZU?si=PKm5J1uuEXofFjjL",
                        IntroductionOfCN: "HcOc7P5BMi4",
                        // Add more topics and their corresponding YouTube video IDs here
                    };

                    if (topicToVideoMap.hasOwnProperty(selectedTopic)) {
                        const videoPlayerContainer = document.getElementById("videoPlayerContainer");
                        const ratingSystemContainer = document.getElementById("rating-system");
                        const videoPlayer = document.getElementById("videoPlayer");

                        // Get the YouTube video ID for the selected topic
                        const selectedVideoId = topicToVideoMap[selectedTopic];

                        if (selectedVideoId) {
                            // Update the src attribute of the iframe to play the selected video
                            videoPlayer.src = `https://www.youtube.com/embed/${selectedVideoId}`;
                            videoPlayerContainer.style.display = "block"; // Show the video player container
                            ratingSystemContainer.style.display = "block"; // Show the rating system container
                        } else {
                            alert("No video selected for the topic.");
                        }
                    } else {
                        alert("No videos available for the selected topic.");
                    }
                }

                document.addEventListener("DOMContentLoaded", function () {
                    const paperList = document.getElementById("paper-list");

                    // Replace this array with actual paper data from your server.
                    const papers = [
                        { name: "Paper 1", url: "inc/l (2).jpg" },
                        { name: "Paper 2", url: "inc/l (1).jpg" },
                        { name: "Paper 3", url: "inc/l (3).jpg" },
                    ];

                    papers.forEach((paper) => {
                        const listItem = document.createElement("li");
                        const paperLink = document.createElement("a");
                        paperLink.href = paper.url;
                        paperLink.textContent = paper.name;
                        listItem.appendChild(paperLink);
                        paperList.appendChild(listItem);
                    });
                });

                // Define quiz questions and answers (replace with your own questions)
const quizQuestions = [
  {
    question: "What is the capital of France?",
    options: ["Paris", "Berlin", "London"],
    answer: "Paris"
  },
  {
    question: "Which planet is known as the Red Planet?",
    options: ["Mars", "Venus", "Jupiter"],
    answer: "Mars"
  },
  // Add more questions in the same format
];

// Function to display a random question from the array
function displayRandomQuestion() {
  const randomIndex = Math.floor(Math.random() * quizQuestions.length);
  const currentQuestion = quizQuestions[randomIndex];
  
  document.getElementById('question').innerText = currentQuestion.question;
  document.getElementById('label1').innerText = currentQuestion.options[0];
  document.getElementById('label2').innerText = currentQuestion.options[1];
  document.getElementById('label3').innerText = currentQuestion.options[2];
  
  // Attach the correct answer to the form for validation
  document.getElementById('quiz-form').setAttribute('data-answer', currentQuestion.answer);
}

// Event listener for quiz form submission
document.getElementById('quiz-form').addEventListener('submit', function(event) {
  event.preventDefault();
  
  const selectedAnswer = document.querySelector('input[name="answer"]:checked');
  const correctAnswer = this.getAttribute('data-answer');
  const resultDisplay = document.getElementById('result');
  
  if (!selectedAnswer) {
    resultDisplay.innerText = "Please select an answer.";
    return;
  }
  
  if (selectedAnswer.value === correctAnswer) {
    resultDisplay.innerText = "Correct!";
  } else {
    resultDisplay.innerText = "Incorrect. The correct answer is: " + correctAnswer;
  }
});

// Call the function to display a random question when the page loads
displayRandomQuestion();






            </script>

</body>

</html>