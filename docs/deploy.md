```yaml
name: RealtyKachingApi

on:
  push:
    branches:
    - main

jobs:
  deploy:
    runs-on: ubuntu-latest

    steps:
    - name: Checkout
      uses: actions/checkout@v2

    - name: Install dependencies
      run: |
        sudo apt-get update
        sudo apt-get install -y git php composer
    
    - name: Configure AWS Credentials
      uses: aws-actions/configure-aws-credentials@v1
      with:
        aws-access-key-id: ${{ secrets.AWS_ACCESS_KEY_ID }}
        aws-secret-access-key: ${{ secrets.AWS_ACCESS_SECRET_KEY }}
        aws-region: eu-west-2

    - name: Deploy Laravel code
      env:
          PRIVATE_KEY: ${{ secrets.AWS_PEM_KEY  }}
          HOSTNAME : ${{ secrets.HOSTNAME  }}
          USER_NAME : ${{ secrets.USER_NAME  }}
      run: |
        cp .env.example .env
        echo "$PRIVATE_KEY" > private_key && chmod 600 private_key
        # composer install
        # php artisan key:generate
        # rsync  -r --exclude '.env' --exclude 'vendor/' --exclude '.git/' --delete-after -e "ssh -i private_key" . ${USER_NAME}@${HOSTNAME}:/var/www/nxgeninventors.com/simba/

        ssh -o StrictHostKeyChecking=no -i private_key ${USER_NAME}@${HOSTNAME} '
            cd /var/www/nxgeninventors.com/simba/ && ls
        '

```