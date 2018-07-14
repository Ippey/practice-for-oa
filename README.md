# Practice fo Onion Architecture

This is a sample Symfony4 project of Onion Architecture


## Install
```php
composer install
cp .env.dist .env
bin/console doctrine:database:create
bin/console doctrine:migrations:migrate
```

## Files
- Common
  - Repository/ProductRepository : Influstructure

- With Onion Architecture
  - Controller/ProductController : Controller
  - Domain/Repository/ProductManageRepository : DomainService
  - Service/ProductService : Application Service

- Without Onion Architecture
  - Controller/NotGoodProductController: Controller
  - Service/NotGoodProductService : Application Service
  

## License
<a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/"><img alt="クリエイティブ・コモンズ・ライセンス" style="border-width:0" src="https://i.creativecommons.org/l/by-nc/4.0/88x31.png" /></a><br />この 作品 は <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/">クリエイティブ・コモンズ 表示 - 非営利 4.0 国際 ライセンス</a>の下に提供されています。
