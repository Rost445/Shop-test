<?php

namespace App\Imports;

use App\Models\ProductModel;
use App\Models\ProductColorModel;
use App\Models\ProductSizeModel;
use App\Models\ProductImageModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;
use App\Exports\ProductModelExport;

class ProductModelImport implements ToCollection, WithHeadingRow
{
    /**
     * Обрабатывает коллекцию строк из Excel
     *
     * @param Collection $rows
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            DB::transaction(function () use ($row) {
                // Создаем или обновляем продукт
                $product = ProductModel::updateOrCreate(
                    ['id' => $row['id']],
                    [
                        'title' => $row['title'],
                        'slug' => $row['slug'],
                        'sku' => $row['sku'],
                        'category_id' => $row['category_id'],
                        'sub_category_id' => $row['sub_category_id'],
                        'brand_id' => $row['brand_id'],
                        'old_price' => $row['old_price'],
                        'price' => $row['price'],
                        'short_description' => $row['short_description'],
                        'description' => $row['description'],
                        'additional_information' => $row['additional_information'],
                        'shipping_returns' => $row['shipping_returns'],
                        'status' => $row['status'],
                        'is_delete' => $row['is_delete'],
                        'created_by' => $row['created_by'],
                    ]
                );

                if (!empty($row['color_ids'])) {
                    $colorIds = explode(',', $row['color_ids']);
                
                    // Удаляем существующие цвета для продукта
                    $product->colors()->delete();
                
                    // Создаем новые записи
                    foreach ($colorIds as $colorId) {
                        $product->colors()->create([
                            'color_id' => $colorId,
                        ]);
                    }
                }

                // Обработка размеров
                if (!empty($row['size_names']) && !empty($row['size_prices'])) {
                    $sizeNames = explode(',', $row['size_names']);
                    $sizePrices = explode(',', $row['size_prices']);
                    foreach ($sizeNames as $index => $name) {
                        ProductSizeModel::updateOrCreate(
                            [
                                'product_id' => $product->id,
                                'name' => $name,
                            ],
                            [
                                'price' => $sizePrices[$index] ?? 0,
                            ]
                        );
                    }
                }

                // Обработка изображений
                if (!empty($row['image_names']) && !empty($row['image_extensions']) && !empty($row['image_order_by'])) {
                    $imageNames = explode(',', $row['image_names']);
                    $imageExtensions = explode(',', $row['image_extensions']);
                    $imageOrderBy = explode(',', $row['image_order_by']);
                    foreach ($imageNames as $index => $imageName) {
                        ProductImageModel::updateOrCreate(
                            [
                                'product_id' => $product->id,
                                'image_name' => $imageName,
                            ],
                            [
                                'image_extension' => $imageExtensions[$index] ?? '',
                                'order_by' => $imageOrderBy[$index] ?? 0,
                            ]
                        );
                    }
                }
            });
        }
    }
}
