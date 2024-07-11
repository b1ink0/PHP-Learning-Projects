# PHPCS RUNNER 
---

#### Discription
This docker-compose will run the phpcs for all the files in src folder and give a phpcs-report.log file

#### Steps to run the project

- First remove the php project folder into the src folder
- Then run the following command make sure docker is running

```bash
docker-compose up --build
```
- You will get a `phpcs-report.log` file 