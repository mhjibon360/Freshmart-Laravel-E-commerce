<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property string $heading
 * @property string $discount_title
 * @property string $image
 * @property string $status 1=active,0=inactive
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ads newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ads newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ads query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ads whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ads whereDiscountTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ads whereHeading($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ads whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ads whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ads whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ads whereUpdatedAt($value)
 */
	class Ads extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $category_name
 * @property string $category_slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogCategory findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogCategory whereCategoryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogCategory whereCategorySlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogCategory withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class BlogCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $category_id
 * @property int $user_id
 * @property string $title
 * @property string $slug
 * @property string $image
 * @property string|null $details
 * @property string $status 1=active,0=inactive
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\BlogCategory $category
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BlogPost withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class BlogPost extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $category_name
 * @property string $category_slug
 * @property string $category_image
 * @property string $featured_category
 * @property string $footer_category
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Subcategory> $subcategories
 * @property-read int|null $subcategories_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereCategoryImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereCategoryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereCategorySlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereFeaturedCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereFooterCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $color_name
 * @property string|null $color_slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Color findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Color newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Color newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Color query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Color whereColorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Color whereColorSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Color whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Color whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Color whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Color withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class Color extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $user_id
 * @property string|null $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Compare newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Compare newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Compare query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Compare whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Compare whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Compare whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Compare whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Compare whereUserId($value)
 */
	class Compare extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $coupon_name
 * @property string $coupon_discount
 * @property string $coupon_validity
 * @property string $status 1=active,0=inactive
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereCouponDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereCouponName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereCouponValidity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Coupon whereUpdatedAt($value)
 */
	class Coupon extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $platform_image
 * @property string $platform_name
 * @property string $platform_link
 * @property string $status 1=active,0=inactive
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Download newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Download newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Download query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Download whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Download whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Download wherePlatformImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Download wherePlatformLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Download wherePlatformName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Download whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Download whereUpdatedAt($value)
 */
	class Download extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $header_title
 * @property string|null $header_logo
 * @property string|null $featured_category_title
 * @property string|null $popular_product_title
 * @property string|null $daily_best_sells_title
 * @property string|null $footer_category_title
 * @property string|null $footer_payment_title
 * @property string|null $download_title
 * @property string|null $copyright
 * @property string|null $follow_us_title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Generalsetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Generalsetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Generalsetting query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Generalsetting whereCopyright($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Generalsetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Generalsetting whereDailyBestSellsTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Generalsetting whereDownloadTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Generalsetting whereFeaturedCategoryTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Generalsetting whereFollowUsTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Generalsetting whereFooterCategoryTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Generalsetting whereFooterPaymentTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Generalsetting whereHeaderLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Generalsetting whereHeaderTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Generalsetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Generalsetting wherePopularProductTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Generalsetting whereUpdatedAt($value)
 */
	class Generalsetting extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $product_id
 * @property string $photo_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Multiimage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Multiimage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Multiimage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Multiimage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Multiimage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Multiimage wherePhotoName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Multiimage whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Multiimage whereUpdatedAt($value)
 */
	class Multiimage extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string|null $division_id
 * @property int|null $district_id
 * @property int|null $upazila_id
 * @property int|null $union_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string|null $address
 * @property string|null $post_code
 * @property string|null $notes
 * @property string|null $payment_type
 * @property string|null $payment_method
 * @property string|null $transaction_id
 * @property string|null $currency
 * @property string|null $amount
 * @property string|null $order_number
 * @property string|null $invoice_no
 * @property string|null $order_date
 * @property string|null $order_month
 * @property string|null $order_year
 * @property string|null $confirmed_date
 * @property string|null $processing_date
 * @property string|null $picked_date
 * @property string|null $shipped_date
 * @property string|null $delivered_date
 * @property string|null $cancel_date
 * @property string|null $return_date
 * @property string|null $return_reason
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCancelDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereConfirmedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereDeliveredDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereDistrictId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereDivisionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereInvoiceNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereOrderDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereOrderMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereOrderNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereOrderYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order wherePickedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order wherePostCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereProcessingDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereReturnDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereReturnReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereShippedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereUnionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereUpazilaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Order whereUserId($value)
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $order_id
 * @property string|null $product_id
 * @property string|null $color
 * @property string|null $size
 * @property string|null $qty
 * @property string|null $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Orderitem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Orderitem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Orderitem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Orderitem whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Orderitem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Orderitem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Orderitem whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Orderitem wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Orderitem whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Orderitem whereQty($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Orderitem whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Orderitem whereUpdatedAt($value)
 */
	class Orderitem extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $payment_name
 * @property string $payment_image
 * @property string $status 1=active,0=inactive
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment wherePaymentImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment wherePaymentName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Payment whereUpdatedAt($value)
 */
	class Payment extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $user_id
 * @property string|null $category_id
 * @property string|null $subcategory_id
 * @property string $product_name
 * @property string|null $slug
 * @property string $thumbnail
 * @property string $price
 * @property string|null $discount_price
 * @property int|null $quantity
 * @property string $product_code
 * @property string|null $details
 * @property string|null $informations
 * @property int $popular_products
 * @property int $best_sells
 * @property string|null $type
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Color> $colors
 * @property-read int|null $colors_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Size> $sizes
 * @property-read int|null $sizes_count
 * @property-read \App\Models\Subcategory|null $subcategory
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereBestSells($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereDiscountPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereInformations($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product wherePopularProducts($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereProductCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereProductName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereSubcategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $user_id
 * @property string|null $product_id
 * @property string|null $rating
 * @property string $message
 * @property string|null $status 0=pending,1=approved
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $users
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Review whereUserId($value)
 */
	class Review extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $review_id
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReviewImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReviewImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReviewImage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReviewImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReviewImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReviewImage whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReviewImage whereReviewId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ReviewImage whereUpdatedAt($value)
 */
	class ReviewImage extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $author_name
 * @property string|null $organization_name
 * @property string|null $details
 * @property string|null $seo_title
 * @property string|null $seo_details
 * @property string|null $seo_tag
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SeoSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SeoSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SeoSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SeoSetting whereAuthorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SeoSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SeoSetting whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SeoSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SeoSetting whereOrganizationName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SeoSetting whereSeoDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SeoSetting whereSeoTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SeoSetting whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SeoSetting whereUpdatedAt($value)
 */
	class SeoSetting extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $icon
 * @property string|null $heading
 * @property string|null $details
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereHeading($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereUpdatedAt($value)
 */
	class Service extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $size_name
 * @property string|null $size_slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Size findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Size newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Size newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Size query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Size whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Size whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Size whereSizeName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Size whereSizeSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Size whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Size withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class Size extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $title
 * @property string $heading
 * @property string $details
 * @property string $image
 * @property string $status 1=active,0=inactive
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereHeading($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereUpdatedAt($value)
 */
	class Slider extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $category_id
 * @property string $subcategory_name
 * @property string $subcategory_slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category|null $category
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subcategory findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subcategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subcategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subcategory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subcategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subcategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subcategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subcategory whereSubcategoryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subcategory whereSubcategorySlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subcategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Subcategory withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 */
	class Subcategory extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $username
 * @property string|null $phone
 * @property string $password
 * @property string|null $address
 * @property string|null $photo
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $role
 * @property string $status
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUsername($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $user_id
 * @property string|null $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Wishlist whereUserId($value)
 */
	class Wishlist extends \Eloquent {}
}

