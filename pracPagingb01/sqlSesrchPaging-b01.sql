select c.cart_id, c.item_id, c.user_id, p.item_brand, p.item_image, p.item_name, p.item_price, u.first_name, u.last_name
from cart c left join product p on c.item_id = p.item_id
left join user u on c.user_id = u.user_id
Where c.item_id = 1
LIMIT 0, 3