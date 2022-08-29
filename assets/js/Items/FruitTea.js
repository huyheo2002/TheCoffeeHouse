import { BaseItem } from "./BaseItem.js";

// extend để kế thừa từ class cha base item
export class FruitTea extends BaseItem{
    constructor(image, title, value){
        // hàm super dùng để tạo mối liên kết từ class con tới class cha
        // hàm super có thể dùng để gọi đến các phương thức của thằng cha
        super(image, title, value);
    }
}