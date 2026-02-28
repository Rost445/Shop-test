<?php

namespace App\Exports;

use App\Models\ProductModel;
use App\Models\ProductImageModel;
use App\Models\ProductSizeModel;
use App\Models\ProductColorModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductModelExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Выполнение запроса с объединением данных из таблиц `product_color`, `product_size`, и `product_image`
        return ProductModel::select(
            'product.id',
            'product.title',
            'product.slug',
            'product.sku',
            'product.category_id',
            'product.sub_category_id',
            'product.brand_id',
            'product.old_price',
            'product.price',
            'product.short_description',
            'product.description',
            'product.additional_information',
            'product.shipping_returns',
            'product.status',
            'product.is_delete',
            'product.created_by',
            'product.created_at',
            'product.updated_at',
            // Данные из `product_color`
            DB::raw('GROUP_CONCAT(product_color.color_id) AS color_ids'),
            DB::raw('GROUP_CONCAT(product_color.id) AS product_color_ids'),
            // Данные из `product_size`
            DB::raw('GROUP_CONCAT(product_size.name) AS size_names'),
            DB::raw('GROUP_CONCAT(product_size.price) AS size_prices'),
            // Данные из `product_image`
            DB::raw('GROUP_CONCAT(product_image.image_name) AS image_names'),
            DB::raw('GROUP_CONCAT(product_image.image_extension) AS image_extensions'),
            DB::raw('GROUP_CONCAT(product_image.order_by) AS image_order_by')
        )
        ->leftJoin('product_color', 'product.id', '=', 'product_color.product_id') // LEFT JOIN для product_color
        ->leftJoin('product_size', 'product.id', '=', 'product_size.product_id') // LEFT JOIN для product_size
        ->leftJoin('product_image', 'product.id', '=', 'product_image.product_id') // LEFT JOIN для product_image
        ->groupBy('product.id')  // Группируем по product.id
        ->get();
    }

    public function headings(): array
    {
        return [
            'Id',
            'Title',
            'Slug',
            'Sku',
            'Category_id',
            'Sub_category_id',
            'Brand_id',
            'Old_price',
            'Price',
            'Short_description',
            'Description',
            'Additional_information',
            'Shipping_returns',
            'Status',
            'Is_delete',
            'Created_by',
            'Created_at',
            'Updated_at',
            // Заголовки для данных из `product_color`
            'Color_ids',
            'Product_color_ids',
            // Заголовки для данных из `product_size`
            'Size_names',
            'Size_prices',
            // Заголовки для данных из `product_image`
            'Image_names',
            'Image_extensions',
            'Image_order_by',
        ];
    }
}
