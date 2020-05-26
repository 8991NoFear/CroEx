{{--

Đây là trang xem toàn bộ sản phẩm
input:  $categories     ---> mảng các loại sản phẩm (làm heading)
        $products       ---> mảng tất cả các sản phẩm (phải foreach)

Yêu cầu: mỗi sản phẩm là 1 ảnh có linh tới trang mua
+, src của ảnh: srt="/storage/{{ $product->image }}"
+, href của link: href="php/products/{{ $product->id }}"

--}}
