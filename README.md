# PHPCS RUNNER 
---

#### Discription
This `docker-compose.yaml` will run the phpcs for all the files in src folder and give a  `phpcs-report.log` file

#### Steps to run the project

- First move the php project folder into the `app/src` folder
- Put the `phpcs.xml` file in the  `app` folder
- Then run the following command and make sure docker is running

    ```bash
    docker-compose up --build
    ```
- You will get a `app/phpcs-report.log` file 