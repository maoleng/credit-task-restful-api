<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style>
    body {
        padding-top: 30px;
    }
    .product {
        margin-bottom: 30px;
    }
    .product-inner {
        box-shadow: 0 0 10px rgba(0,0,0,.2);
        padding: 10px;
    }
    .product img {
        margin-bottom: 10px;
    }
</style>
<div class="container">
    <div class="row" id="search">
        <div class="form-group col-xs-9">
            <input class="form-control" type="text" placeholder="Search" />
        </div>
    </div>
    <div class="row" id="filter">
        <form>
            <div class="form-group col-sm-3 col-xs-6">
                <select data-filter="make" class="filter-make filter form-control">
                    <option value="">All</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category->id ?>"><?= $category->name ?></option>
                        <?php endforeach ?>
                </select>
            </div>
        </form>
    </div>

    <div id="product">
        <?php foreach ($items as $item): ?>
            <div class='col-sm-4 product' data-make='" + make + "' data-model='" + model + "' data-type='" + type + "' data-price='" + rawPrice + "'>
                <div class='product-inner text-center'>
                    <img width="80%" src="https://i.pinimg.com/originals/c5/f7/23/c5f723a44211c5ccf74d382734bc0ab7.jpg" alt="">
                    <br />Name: <?= $item->name ?>
                    <br />Size: <?= $item->size ?>
                    <br />Price: <?= prettyMoney($item->price) ?>
                    <br />Category: <?= $item->category_name ?>
                </div>
            </div>
        <?php endforeach ?>
    </div>


</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>

    $("select").on("change",function() {
        $.ajax({
            url: '<?= url('search_by_category') ?>',
            data: {
                'category_id': $(this).val(),
            },
        }).done(function (data) {
            $('#product').empty()
            data.data.forEach(function (each) {
                $('#product').append(`
                    <div class='col-sm-4 product' data-make='" + make + "' data-model='" + model + "' data-type='" + type + "' data-price='" + rawPrice + "'>
                        <div class='product-inner text-center'>
                            <img width="80%" src="https://i.pinimg.com/originals/c5/f7/23/c5f723a44211c5ccf74d382734bc0ab7.jpg" alt="">
                            <br />Name: ${each.name}
                            <br />Size: ${each.size}
                            <br />Price: ${prettyMoney(each.price)}
                            <br />Category: ${each.category_name}
                        </div>
                    </div>
                `)
            })
        })
        
    });

    $("input").keyup(function(event) {
        const value = $(this).val()

        $.get(`<?= url('search_by_name') ?>?q=${value}`, function (data) {
            $("#product").empty();

            data.data.forEach((each) => {
                $('#product').append(`
                    <div class='col-sm-4 product' data-make='" + make + "' data-model='" + model + "' data-type='" + type + "' data-price='" + rawPrice + "'>
                        <div class='product-inner text-center'>
                            <img width="80%" src="https://i.pinimg.com/originals/c5/f7/23/c5f723a44211c5ccf74d382734bc0ab7.jpg" alt="">
                            <br />Name: ${each.name}
                            <br />Size: ${each.size}
                            <br />Price: ${prettyMoney(each.price)}
                            <br />Category: ${each.category_name}
                        </div>
                    </div>
                `)
            })
        })
    })

    function prettyMoney(money)
    {
        const formatter = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
        })

        return formatter.format(money)
    }
</script>