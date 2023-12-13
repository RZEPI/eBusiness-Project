# eBusiness-Project

## Web scraping
### Steps to run the scraper
Open favourite console. Then move to the project directory and move to scraper directory
```
cd path/to/this/project
cd scraper
```
Create _venv_:
```
py venv venv
```
Activate _venv_:
```
./venv/Scripts/activate
```
Download python packages:
```
pip install -r requirements.txt
```
Run scraper script:
```
py ./scraper_api.py
```
> The anticipation begins...

## Steps to set up the store
Use a Linux system, preferably WSL. In the bash console, navigate to the source path:
```
cd path/to/this/project
cd source
```
Grant permissions recursively to all files:
```
sudo chmod -R 777 *
```
Generate a self-signed SSL certificate using a script. This should be done only on the first launch of the store:
```
./generateSSL.sh
```
Run the store using docker compose. You may have to wait a while for the images to download:
```
docker compose up -d
```
Open the main store page:  
Open a web browser and go to the address https://localhost

To close the store:  
Run the script creating a database dump:
```
./dump.sh
```
Remove containers:
```
docker compose down
```

## Steps to use the tester
Open favourite console. Then move to the project directory and move to scraper directory
```
cd path/to/this/project
cd tests
```
Create _venv_:
```
py venv venv
```
Activate _venv_:
```
./venv/Scripts/activate
```
Download python packages:
```
pip install -r requirements.txt
```
Run tests script:
```
py ./main.py
```
## Adding products via Presta Shop API
Open scripts file:
```
cd path/to/this/project
cd scripts
```

Create _venv_, activate it and download python packages as previously.
Run the script:
```
py ./api-script.py

```
## Adding products via Presta Shop API
Open scripts file:
```
cd path/to/this/project
cd scripts
```
Create _venv_, activate it and download python packages as previously.
Run the script:
```
py ./api-script.py
```

## Team members 

 - Alicja Graczyk 188814
 - Łukasz Prahl 184340
 - Paweł Rzepecki 191703
