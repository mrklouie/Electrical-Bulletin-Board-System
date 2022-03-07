<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;900&family=Poppins:wght@400;500;700;800&display=swap"
      rel="stylesheet"
    />
    <style>
      :root {
        --citcs: #cc2a49;
      }
      * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: "Poppins", sans-serif;
      }
      body {
        position: relative;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .container {
        width: 200px;
        height: 200px;
      }

      .container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        animation: shake 1s cubic-bezier(0.36, 0.07, 0.19, 0.97) both;
        transform: translate3d(0, 0, 0);
        backface-visibility: hidden;
        perspective: 1000px;
      }

      p {
        color: var(--citcs);
        font-size: 3rem;
      }

      a {
        position: absolute;
        bottom: 10%;
      }
      .go-back {
        padding: 1rem;
        width: 20rem;
        background: none;
        border-style: none;
        border: 3px solid var(--citcs);
        text-transform: uppercase;
        font-size: 1.2rem;
        cursor: pointer;
        transition: background-color 0.3s ease, color 0.3s ease;
      }

      .go-back:hover {
        background-color: var(--citcs);
        color: white;
      }

      @keyframes shake {
        10%,
        90% {
          transform: translate3d(-1px, 0, 0);
        }

        20%,
        80% {
          transform: translate3d(2px, 0, 0);
        }

        30%,
        50%,
        70% {
          transform: translate3d(-4px, 0, 0);
        }

        40%,
        60% {
          transform: translate3d(4px, 0, 0);
        }
      }

      @media screen and (max-width: 768px) {
        body{
          flex-direction: column;
        }

        p{
          font-size: 2rem;
          text-align: center;
        }
      }
    </style>
  </head>
  <body>
    <div class="container">
      <img class="trash" src="images/trash.svg" alt="" />
    </div>
    <p>Account Deleted Successfully</p>
    <a href="../JS-PHP-Carousel/index.php">
      <button class="go-back">Back to home</button>
    </a>
  </body>
</html>
