!function(e){var t={};function r(n){if(t[n])return t[n].exports;var o=t[n]={i:n,l:!1,exports:{}};return e[n].call(o.exports,o,o.exports,r),o.l=!0,o.exports}r.m=e,r.c=t,r.d=function(e,t,n){r.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},r.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.t=function(e,t){if(1&t&&(e=r(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(r.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)r.d(n,o,function(t){return e[t]}.bind(null,o));return n},r.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(t,"a",t),t},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r.p="",r(r.s=251)}({0:function(e,t){!function(){e.exports=this.wp.element}()},1:function(e,t){!function(){e.exports=this.wp.i18n}()},11:function(e,t){function r(){return e.exports=r=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var r=arguments[t];for(var n in r)Object.prototype.hasOwnProperty.call(r,n)&&(e[n]=r[n])}return e},r.apply(this,arguments)}e.exports=r},124:function(e,t,r){"use strict";r(5);var n=r(4),o=r.n(n),i=r(28),a=r(94);r(137);t.a=Object(a.a)((function(e){var t=e.className,r=e.instanceId,n=e.defaultValue,a=e.label,c=e.onChange,s=e.options,u=e.screenReaderLabel,l=e.readOnly,p=e.value,f="wc-block-sort-select__select-".concat(r);return React.createElement("div",{className:o()("wc-block-sort-select",t)},React.createElement(i.a,{label:a,screenReaderLabel:u,wrapperElement:"label",wrapperProps:{className:"wc-block-sort-select__label",htmlFor:f}}),React.createElement("select",{id:f,className:"wc-block-sort-select__select",defaultValue:n,onChange:c,readOnly:l,value:p},s.map((function(e){return React.createElement("option",{key:e.key,value:e.key},e.label)}))))}))},125:function(e,t,r){"use strict";r.d(t,"a",(function(){return c}));var n=r(22),o=r.n(n),i=r(50),a=r.n(i),c=function(){var e=a()(o.a.mark((function e(t){var r;return o.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:if("function"!=typeof t.json){e.next=11;break}return e.prev=1,e.next=4,t.json();case 4:return r=e.sent,e.abrupt("return",{message:r.message,type:r.type||"api"});case 8:return e.prev=8,e.t0=e.catch(1),e.abrupt("return",{message:e.t0.message,type:"general"});case 11:return e.abrupt("return",{message:t.message,type:t.type||"general"});case 12:case"end":return e.stop()}}),e,null,[[1,8]])})));return function(t){return e.apply(this,arguments)}}()},137:function(e,t){},179:function(e,t,r){function n(e){for(var t,r,n=[],o=0;o<rowCut.length;o++)(t=rowCut.substring(o).match(/^&[a-z0-9#]+;/))?(r=t[0],n.push(r),o+=r.length-1):n.push(rowCut[o]);return n}e.exports&&(e.exports=function(e,t){for(var r,o,i,a,c,s=(t=t||{}).limit||100,u=void 0===t.preserveTags||t.preserveTags,l=void 0!==t.wordBreak&&t.wordBreak,p=t.suffix||"...",f=t.moreLink||"",d=t.moreText||"»",v=t.preserveWhiteSpace||!1,g=e.replace(/</g,"\n<").replace(/>/g,">\n").replace(/\n\n/g,"\n").replace(/^\n/g,"").replace(/\n$/g,"").split("\n"),b=0,h=[],m=!1,w=0;w<g.length;w++)if(r=g[w],rowCut=v?r:r.replace(/[ ]+/g," "),r.length){var y=n(rowCut);if("<"!==r[0])if(b>=s)r="";else if(b+y.length>=s){if(" "===y[(o=s-b)-1])for(;o&&" "===y[(o-=1)-1];);else i=y.slice(o).indexOf(" "),l||(-1!==i?o+=i:o=r.length);r=y.slice(0,o).join("")+p,f&&(r+='<a href="'+f+'" style="display:inline">'+d+"</a>"),b=s,m=!0}else b+=y.length;else if(u){if(b>=s)if(c=(a=r.match(/[a-zA-Z]+/))?a[0]:"")if("</"!==r.substring(0,2))h.push(c),r="";else{for(;h[h.length-1]!==c&&h.length;)h.pop();h.length&&(r=""),h.pop()}else r=""}else r="";g[w]=r}return{html:g.join("\n").replace(/\n/g,""),more:m}})},186:function(e,t){},187:function(e,t){},188:function(e,t){},189:function(e,t){},19:function(e,t){e.exports=function(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}},2:function(e,t){!function(){e.exports=this.wc.wcSettings}()},20:function(e,t){function r(t){return"function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?e.exports=r=function(e){return typeof e}:e.exports=r=function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},r(t)}e.exports=r},21:function(e,t){function r(t){return e.exports=r=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)},r(t)}e.exports=r},22:function(e,t){!function(){e.exports=this.regeneratorRuntime}()},251:function(e,t,r){"use strict";r.r(t);var n=r(98),o=r(32),i=r.n(o),a=r(33),c=r.n(a),s=r(19),u=r.n(s),l=r(34),p=r.n(l),f=r(35),d=r.n(f),v=r(21),g=r.n(v),b=r(1),h=r(42),m=r(3),w=r.n(m),y=(r(5),r(57)),O=r.n(y),R=r(4),j=r.n(R),_=r(8),k=function(e){return O()({path:"/wc/store/products/reviews?"+Object.entries(e).map((function(e){return e.join("=")})).join("&"),parse:!1}).then((function(e){return e.json().then((function(t){return{reviews:t,totalReviews:parseInt(e.headers.get("x-wp-total"),10)}}))}))},E=r(28),x=(r(189),function(e){var t=e.onClick,r=e.label,n=e.screenReaderLabel;return React.createElement("div",{className:"wp-block-button wc-block-load-more"},React.createElement("button",{className:"wp-block-button__link",onClick:t},React.createElement(E.a,{label:r,screenReaderLabel:n})))});x.defaultProps={label:Object(b.__)("Load more","woo-gutenberg-products-block")};var S=x,P=r(124),T=(r(186),function(e){var t=e.defaultValue,r=e.onChange,n=e.readOnly,o=e.value;return React.createElement(P.a,{className:"wc-block-review-sort-select",defaultValue:t,label:Object(b.__)("Order by","woo-gutenberg-products-block"),onChange:r,options:[{key:"most-recent",label:Object(b.__)("Most recent","woo-gutenberg-products-block")},{key:"highest-rating",label:Object(b.__)("Highest rating","woo-gutenberg-products-block")},{key:"lowest-rating",label:Object(b.__)("Lowest rating","woo-gutenberg-products-block")}],readOnly:n,screenReaderLabel:Object(b.__)("Order reviews by","woo-gutenberg-products-block"),value:o})}),C=r(6),N=r.n(C),L=r(179),D=r.n(L),A=function(e,t){var r=arguments.length>2&&void 0!==arguments[2]?arguments[2]:"...",n=D()(e,{suffix:r,limit:t});return n.html},I=function(e,t,r,n){var o=M(e,t,r);return A(e,o-n.length,n)},M=function(e,t,r){for(var n={start:0,middle:0,end:e.length};n.start<=n.end;)n.middle=Math.floor((n.start+n.end)/2),t.innerHTML=A(e,n.middle),n=B(n,t.clientHeight,r);return n.middle},B=function(e,t,r){return t<=r?e.start=e.middle+1:e.end=e.middle-1,e};function H(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var r,n=g()(e);if(t){var o=g()(this).constructor;r=Reflect.construct(n,arguments,o)}else r=n.apply(this,arguments);return d()(this,r)}}var F=function(e){p()(r,e);var t=H(r);function r(e){var n;return i()(this,r),(n=t.apply(this,arguments)).state={isExpanded:!1,clampEnabled:null,content:e.children,summary:"."},n.reviewSummary=Object(m.createRef)(),n.reviewContent=Object(m.createRef)(),n.getButton=n.getButton.bind(u()(n)),n.onClick=n.onClick.bind(u()(n)),n}return c()(r,[{key:"componentDidMount",value:function(){if(this.props.children){var e=this.props,t=e.maxLines,r=e.ellipsis,n=(this.reviewSummary.current.clientHeight+1)*t+1,o=this.reviewContent.current.clientHeight+1>n;this.setState({clampEnabled:o}),o&&this.setState({summary:I(this.reviewContent.current.innerHTML,this.reviewSummary.current,n,r)})}}},{key:"getButton",value:function(){var e=this.state.isExpanded,t=this.props,r=t.className,n=t.lessText,o=t.moreText,i=e?n:o;if(i)return w.a.createElement("a",{href:"#more",className:r+"__read_more",onClick:this.onClick,"aria-expanded":!e,role:"button"},i)}},{key:"onClick",value:function(e){e.preventDefault();var t=this.state.isExpanded;this.setState({isExpanded:!t})}},{key:"render",value:function(){var e=this.props.className,t=this.state,r=t.content,n=t.summary,o=t.clampEnabled,i=t.isExpanded;return r?!1===o?w.a.createElement("div",{className:e},w.a.createElement("div",{ref:this.reviewContent},r)):w.a.createElement("div",{className:e},(!i||null===o)&&w.a.createElement("div",{ref:this.reviewSummary,"aria-hidden":i,dangerouslySetInnerHTML:{__html:n}}),(i||null===o)&&w.a.createElement("div",{ref:this.reviewContent,"aria-hidden":!i},r),this.getButton()):null}}]),r}(m.Component);F.defaultProps={maxLines:3,ellipsis:"&hellip;",moreText:Object(b.__)("Read more","woo-gutenberg-products-block"),lessText:Object(b.__)("Read less","woo-gutenberg-products-block"),className:"read-more-content"};var U=F;r(188);var V=function(e){var t=e.attributes,r=e.review,n=void 0===r?{}:r,o=t.imageType,i=t.showReviewDate,a=t.showReviewerName,c=t.showReviewImage,s=t.showReviewRating,u=t.showReviewContent,l=t.showProductName,p=n.rating,f=!Object.keys(n).length>0,d=Number.isFinite(p)&&s;return React.createElement("li",{className:j()("wc-block-review-list-item__item",{"is-loading":f}),"aria-hidden":f},(l||i||a||c||d)&&React.createElement("div",{className:"wc-block-review-list-item__info"},c&&function(e,t,r){var n,o;return r||!e?React.createElement("div",{className:"wc-block-review-list-item__image",width:"48",height:"48"}):React.createElement("div",{className:"wc-block-review-list-item__image"},"product"===t?React.createElement("img",{"aria-hidden":"true",alt:(null===(n=e.product_image)||void 0===n?void 0:n.alt)||"",src:(null===(o=e.product_image)||void 0===o?void 0:o.src)||"",className:"wc-block-review-list-item__image",width:"48",height:"48"}):React.createElement("img",{"aria-hidden":"true",alt:"",src:e.reviewer_avatar_urls[48]||"",srcSet:e.reviewer_avatar_urls[96]+" 2x",className:"wc-block-review-list-item__image",width:"48",height:"48"}),e.verified&&React.createElement("div",{className:"wc-block-review-list-item__verified",title:Object(b.__)("Verified buyer","woo-gutenberg-products-block")},Object(b.__)("Verified buyer","woo-gutenberg-products-block")))}(n,o,f),(l||a||d||i)&&React.createElement("div",{className:"wc-block-review-list-item__meta"},d&&function(e){var t=e.rating,r={width:t/5*100+"%"};return React.createElement("div",{className:"wc-block-review-list-item__rating"},React.createElement("div",{className:"wc-block-review-list-item__rating__stars",role:"img"},React.createElement("span",{style:r},Object(b.sprintf)(Object(b.__)("Rated %f out of 5","woo-gutenberg-products-block"),t))))}(n),l&&function(e){return React.createElement("div",{className:"wc-block-review-list-item__product"},React.createElement("a",{href:e.product_permalink,dangerouslySetInnerHTML:{__html:e.product_name}}))}(n),a&&function(e){var t=e.reviewer,r=void 0===t?"":t;return React.createElement("div",{className:"wc-block-review-list-item__author"},r)}(n),i&&function(e){var t=e.date_created,r=e.formatted_date_created;return React.createElement("time",{className:"wc-block-review-list-item__published-date",dateTime:t},r)}(n))),u&&function(e){return React.createElement(U,{maxLines:10,moreText:Object(b.__)("Read full review","woo-gutenberg-products-block"),lessText:Object(b.__)("Hide full review","woo-gutenberg-products-block"),className:"wc-block-review-list-item__text"},React.createElement("div",{dangerouslySetInnerHTML:{__html:e.review||""}}))}(n))};r(187);function W(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}function z(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?W(Object(r),!0).forEach((function(t){N()(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):W(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}var q=function(e){var t=e.attributes,r=e.reviews,n=(_.w||"product"===t.imageType)&&t.showReviewImage,o=_.s&&t.showReviewRating,i=z(z({},t),{},{showReviewImage:n,showReviewRating:o});return React.createElement("ul",{className:"wc-block-review-list"},0===r.length?React.createElement(V,{attributes:i}):r.map((function(e,t){return React.createElement(V,{key:e.id||t,attributes:i,review:e})})))},G=r(11),Y=r.n(G),Z=r(22),$=r.n(Z),J=r(50),K=r.n(J),Q=r(37),X=r.n(Q),ee=r(125);function te(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var r,n=g()(e);if(t){var o=g()(this).constructor;r=Reflect.construct(n,arguments,o)}else r=n.apply(this,arguments);return d()(this,r)}}var re=function(e){var t=function(t){p()(n,t);var r=te(n);function n(){var e;i()(this,n);for(var t=arguments.length,o=new Array(t),a=0;a<t;a++)o[a]=arguments[a];return e=r.call.apply(r,[this].concat(o)),N()(u()(e),"isPreview",!!e.props.attributes.previewReviews),N()(u()(e),"delayedAppendReviews",e.props.delayFunction(e.appendReviews)),N()(u()(e),"state",{error:null,loading:!0,reviews:e.isPreview?e.props.attributes.previewReviews:[],totalReviews:e.isPreview?e.props.attributes.previewReviews.length:0}),N()(u()(e),"setError",function(){var t=K()($.a.mark((function t(r){var n,o;return $.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return n=e.props.onReviewsLoadError,t.next=3,Object(ee.a)(r);case 3:o=t.sent,e.setState({reviews:[],loading:!1,error:o}),n(o);case 6:case"end":return t.stop()}}),t)})));return function(e){return t.apply(this,arguments)}}()),e}return c()(n,[{key:"componentDidMount",value:function(){this.replaceReviews()}},{key:"componentDidUpdate",value:function(e){e.reviewsToDisplay<this.props.reviewsToDisplay?this.delayedAppendReviews():this.shouldReplaceReviews(e,this.props)&&this.replaceReviews()}},{key:"shouldReplaceReviews",value:function(e,t){return e.orderby!==t.orderby||e.order!==t.order||e.productId!==t.productId||!X()(e.categoryIds,t.categoryIds)}},{key:"componentWillUnMount",value:function(){this.delayedAppendReviews.cancel&&this.delayedAppendReviews.cancel()}},{key:"getArgs",value:function(e){var t=this.props,r=t.categoryIds,n=t.order,o=t.orderby,i=t.productId,a={order:n,orderby:o,per_page:t.reviewsToDisplay-e,offset:e};return r&&r.length&&(a.category_id=Array.isArray(r)?r.join(","):r),i&&(a.product_id=i),a}},{key:"replaceReviews",value:function(){if(!this.isPreview){var e=this.props.onReviewsReplaced;this.updateListOfReviews().then(e)}}},{key:"appendReviews",value:function(){if(!this.isPreview){var e=this.props,t=e.onReviewsAppended,r=e.reviewsToDisplay,n=this.state.reviews;r<=n.length||this.updateListOfReviews(n).then(t)}}},{key:"updateListOfReviews",value:function(){var e=this,t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[],r=this.props.reviewsToDisplay,n=this.state.totalReviews,o=Math.min(n,r)-t.length;return this.setState({loading:!0,reviews:t.concat(Array(o).fill({}))}),k(this.getArgs(t.length)).then((function(r){var n=r.reviews,o=r.totalReviews;return e.setState({reviews:t.filter((function(e){return Object.keys(e).length})).concat(n),totalReviews:o,loading:!1,error:null}),{newReviews:n}})).catch(this.setError)}},{key:"render",value:function(){var t=this.props.reviewsToDisplay,r=this.state,n=r.error,o=r.loading,i=r.reviews,a=r.totalReviews;return React.createElement(e,Y()({},this.props,{error:n,isLoading:o,reviews:i.slice(0,t),totalReviews:a}))}}]),n}(m.Component);N()(t,"defaultProps",{delayFunction:function(e){return e},onReviewsAppended:function(){},onReviewsLoadError:function(){},onReviewsReplaced:function(){}});var r=e.displayName,n=void 0===r?e.name||"Component":r;return t.displayName="WithReviews( ".concat(n," )"),t}((function(e){var t=e.attributes,r=e.onAppendReviews,n=e.onChangeOrderby,o=e.reviews,i=e.totalReviews,a=t.orderby;return 0===o.length?null:React.createElement(m.Fragment,null,"false"!==t.showOrderby&&_.s&&React.createElement(T,{defaultValue:a,onChange:n}),React.createElement(q,{attributes:t,reviews:o}),"false"!==t.showLoadMore&&i>o.length&&React.createElement(S,{onClick:r,screenReaderLabel:Object(b.__)("Load more reviews","woo-gutenberg-products-block")}))}));function ne(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var r,n=g()(e);if(t){var o=g()(this).constructor;r=Reflect.construct(n,arguments,o)}else r=n.apply(this,arguments);return d()(this,r)}}var oe=function(e){p()(r,e);var t=ne(r);function r(){var e;i()(this,r);var n=(e=t.apply(this,arguments)).props.attributes;return e.state={orderby:n.orderby,reviewsToDisplay:parseInt(n.reviewsOnPageLoad,10)},e.onAppendReviews=e.onAppendReviews.bind(u()(e)),e.onChangeOrderby=e.onChangeOrderby.bind(u()(e)),e}return c()(r,[{key:"onAppendReviews",value:function(){var e=this.props.attributes,t=this.state.reviewsToDisplay;this.setState({reviewsToDisplay:t+parseInt(e.reviewsOnLoadMore,10)})}},{key:"onChangeOrderby",value:function(e){var t=this.props.attributes;this.setState({orderby:e.target.value,reviewsToDisplay:parseInt(t.reviewsOnPageLoad,10)})}},{key:"onReviewsAppended",value:function(e){var t=e.newReviews;Object(h.speak)(Object(b.sprintf)(Object(b._n)("%d review loaded.","%d reviews loaded.",t.length,"woo-gutenberg-products-block"),t.length))}},{key:"onReviewsReplaced",value:function(){Object(h.speak)(Object(b.__)("Reviews list updated.","woo-gutenberg-products-block"))}},{key:"onReviewsLoadError",value:function(){Object(h.speak)(Object(b.__)("There was an error loading the reviews.","woo-gutenberg-products-block"))}},{key:"render",value:function(){var e=this.props.attributes,t=e.categoryIds,r=e.productId,n=this.state.reviewsToDisplay,o=function(e){if(_.s){if("lowest-rating"===e)return{order:"asc",orderby:"rating"};if("highest-rating"===e)return{order:"desc",orderby:"rating"}}return{order:"desc",orderby:"date_gmt"}}(this.state.orderby),i=o.order,a=o.orderby;return React.createElement(re,{attributes:e,categoryIds:t,onAppendReviews:this.onAppendReviews,onChangeOrderby:this.onChangeOrderby,onReviewsAppended:this.onReviewsAppended,onReviewsLoadError:this.onReviewsLoadError,onReviewsReplaced:this.onReviewsReplaced,order:i,orderby:a,productId:r,reviewsToDisplay:n})}}]),r}(m.Component);Object(n.a)({selector:"\n\t.wp-block-woocommerce-all-reviews,\n\t.wp-block-woocommerce-reviews-by-product,\n\t.wp-block-woocommerce-reviews-by-category\n",Block:oe,getProps:function(e){return{attributes:{showReviewDate:e.classList.contains("has-date"),showReviewerName:e.classList.contains("has-name"),showReviewImage:e.classList.contains("has-image"),showReviewRating:e.classList.contains("has-rating"),showReviewContent:e.classList.contains("has-content"),showProductName:e.classList.contains("has-product-name")}}}})},28:function(e,t,r){"use strict";var n=r(6),o=r.n(n),i=(r(5),r(3)),a=r(4),c=r.n(a);function s(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}function u(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?s(Object(r),!0).forEach((function(t){o()(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):s(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}var l=function(e){var t,r=e.label,n=e.screenReaderLabel,o=e.wrapperElement,a=e.wrapperProps,s=null!=r,l=null!=n;return!s&&l?(t=o||"span",a=u(u({},a),{},{className:c()(a.className,"screen-reader-text")}),React.createElement(t,a,n)):(t=o||i.Fragment,s&&l&&r!==n?React.createElement(t,a,React.createElement("span",{"aria-hidden":"true"},r),React.createElement("span",{className:"screen-reader-text"},n)):React.createElement(t,a,r))};l.defaultProps={wrapperProps:{}},t.a=l},3:function(e,t){!function(){e.exports=this.React}()},32:function(e,t){e.exports=function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}},33:function(e,t){function r(e,t){for(var r=0;r<t.length;r++){var n=t[r];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}e.exports=function(e,t,n){return t&&r(e.prototype,t),n&&r(e,n),e}},34:function(e,t,r){var n=r(58);e.exports=function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&n(e,t)}},35:function(e,t,r){var n=r(20),o=r(19);e.exports=function(e,t){return!t||"object"!==n(t)&&"function"!=typeof t?o(e):t}},37:function(e,t){!function(){e.exports=this.wp.isShallowEqual}()},39:function(e,t){!function(){e.exports=this.wp.blocks}()},4:function(e,t,r){var n;
/*!
  Copyright (c) 2017 Jed Watson.
  Licensed under the MIT License (MIT), see
  http://jedwatson.github.io/classnames
*/!function(){"use strict";var r={}.hasOwnProperty;function o(){for(var e=[],t=0;t<arguments.length;t++){var n=arguments[t];if(n){var i=typeof n;if("string"===i||"number"===i)e.push(n);else if(Array.isArray(n)&&n.length){var a=o.apply(null,n);a&&e.push(a)}else if("object"===i)for(var c in n)r.call(n,c)&&n[c]&&e.push(c)}}return e.join(" ")}e.exports?(o.default=o,e.exports=o):void 0===(n=function(){return o}.apply(t,[]))||(e.exports=n)}()},42:function(e,t){!function(){e.exports=this.wp.a11y}()},43:function(e,t,r){"use strict";var n=r(32),o=r.n(n),i=r(33),a=r.n(i),c=r(19),s=r.n(c),u=r(34),l=r.n(u),p=r(35),f=r.n(p),d=r(21),v=r.n(d),g=r(6),b=r.n(g),h=(r(5),r(3)),m=r(1),w=r(8),y=function(e){var t=e.imageUrl,r=void 0===t?"".concat(w.A,"img/block-error.svg"):t,n=e.header,o=void 0===n?Object(m.__)("Oops!","woo-gutenberg-products-block"):n,i=e.text,a=void 0===i?Object(m.__)("There was an error loading the content.","woo-gutenberg-products-block"):i,c=e.errorMessage,s=e.errorMessagePrefix,u=void 0===s?Object(m.__)("Error:","woo-gutenberg-products-block"):s;return React.createElement("div",{className:"wc-block-error"},r&&React.createElement("img",{className:"wc-block-error__image",src:r,alt:""}),React.createElement("div",{className:"wc-block-error__content"},o&&React.createElement("p",{className:"wc-block-error__header"},o),a&&React.createElement("p",{className:"wc-block-error__text"},a),c&&React.createElement("p",{className:"wc-block-error__message"},u?u+" ":"",c)))};r(61);function O(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var r,n=v()(e);if(t){var o=v()(this).constructor;r=Reflect.construct(n,arguments,o)}else r=n.apply(this,arguments);return f()(this,r)}}var R=function(e){l()(r,e);var t=O(r);function r(){var e;o()(this,r);for(var n=arguments.length,i=new Array(n),a=0;a<n;a++)i[a]=arguments[a];return e=t.call.apply(t,[this].concat(i)),b()(s()(e),"state",{errorMessage:"",hasError:!1}),e}return a()(r,[{key:"render",value:function(){var e=this.props,t=e.header,r=e.imageUrl,n=e.showErrorMessage,o=e.text,i=e.errorMessagePrefix,a=this.state,c=a.errorMessage;return a.hasError?React.createElement(y,{errorMessage:n?c:null,header:t,imageUrl:r,text:o,errorMessagePrefix:i}):this.props.children}}],[{key:"getDerivedStateFromError",value:function(e){return void 0!==e.statusText&&void 0!==e.status?{errorMessage:React.createElement(h.Fragment,null,React.createElement("strong",null,e.status),": ",e.statusText),hasError:!0}:{errorMessage:e.message,hasError:!0}}}]),r}(h.Component);R.defaultProps={showErrorMessage:!0};t.a=R},44:function(e,t){!function(){e.exports=this.ReactDOM}()},5:function(e,t,r){e.exports=r(59)()},50:function(e,t){function r(e,t,r,n,o,i,a){try{var c=e[i](a),s=c.value}catch(e){return void r(e)}c.done?t(s):Promise.resolve(s).then(n,o)}e.exports=function(e){return function(){var t=this,n=arguments;return new Promise((function(o,i){var a=e.apply(t,n);function c(e){r(a,o,i,c,s,"next",e)}function s(e){r(a,o,i,c,s,"throw",e)}c(void 0)}))}}},57:function(e,t){!function(){e.exports=this.wp.apiFetch}()},58:function(e,t){function r(t,n){return e.exports=r=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e},r(t,n)}e.exports=r},59:function(e,t,r){"use strict";var n=r(60);function o(){}function i(){}i.resetWarningCache=o,e.exports=function(){function e(e,t,r,o,i,a){if(a!==n){var c=new Error("Calling PropTypes validators directly is not supported by the `prop-types` package. Use PropTypes.checkPropTypes() to call them. Read more at http://fb.me/use-check-prop-types");throw c.name="Invariant Violation",c}}function t(){return e}e.isRequired=e;var r={array:e,bool:e,func:e,number:e,object:e,string:e,symbol:e,any:e,arrayOf:t,element:e,elementType:e,instanceOf:t,node:e,objectOf:t,oneOf:t,oneOfType:t,shape:t,exact:t,checkPropTypes:i,resetWarningCache:o};return r.PropTypes=r,r}},6:function(e,t){e.exports=function(e,t,r){return t in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}},60:function(e,t,r){"use strict";e.exports="SECRET_DO_NOT_PASS_THIS_OR_YOU_WILL_BE_FIRED"},61:function(e,t){},7:function(e,t){!function(){e.exports=this.lodash}()},8:function(e,t,r){"use strict";r.d(t,"i",(function(){return o})),r.d(t,"s",(function(){return i})),r.d(t,"w",(function(){return a})),r.d(t,"p",(function(){return c})),r.d(t,"l",(function(){return s})),r.d(t,"o",(function(){return u})),r.d(t,"h",(function(){return l})),r.d(t,"x",(function(){return p})),r.d(t,"k",(function(){return f})),r.d(t,"j",(function(){return d})),r.d(t,"c",(function(){return v})),r.d(t,"m",(function(){return g})),r.d(t,"n",(function(){return b})),r.d(t,"A",(function(){return h})),r.d(t,"t",(function(){return m})),r.d(t,"a",(function(){return w})),r.d(t,"u",(function(){return y})),r.d(t,"b",(function(){return O})),r.d(t,"f",(function(){return R})),r.d(t,"v",(function(){return k})),r.d(t,"g",(function(){return E})),r.d(t,"r",(function(){return x})),r.d(t,"q",(function(){return S})),r.d(t,"z",(function(){return P})),r.d(t,"y",(function(){return T})),r.d(t,"d",(function(){return C})),r.d(t,"e",(function(){return N}));var n=r(2),o=Object(n.getSetting)("currentUserIsAdmin",!1),i=Object(n.getSetting)("reviewRatingsEnabled",!0),a=Object(n.getSetting)("showAvatars",!0),c=(Object(n.getSetting)("max_columns",6),Object(n.getSetting)("min_columns",1),Object(n.getSetting)("default_columns",3),Object(n.getSetting)("max_rows",6),Object(n.getSetting)("min_rows",1),Object(n.getSetting)("default_rows",3),Object(n.getSetting)("min_height",500),Object(n.getSetting)("default_height",500),Object(n.getSetting)("placeholderImgSrc","")),s=(Object(n.getSetting)("thumbnail_size",300),Object(n.getSetting)("isLargeCatalog")),u=Object(n.getSetting)("limitTags"),l=(Object(n.getSetting)("hasProducts",!0),Object(n.getSetting)("hasTags",!0),Object(n.getSetting)("homeUrl",""),Object(n.getSetting)("couponsEnabled",!0)),p=(Object(n.getSetting)("shippingEnabled",!0),Object(n.getSetting)("taxesEnabled",!0)),f=Object(n.getSetting)("displayItemizedTaxes",!1),d=(Object(n.getSetting)("displayShopPricesIncludingTax",!1),Object(n.getSetting)("displayCartPricesIncludingTax",!1)),v=(Object(n.getSetting)("productCount",0),Object(n.getSetting)("attributes",[])),g=Object(n.getSetting)("isShippingCalculatorEnabled",!0),b=Object(n.getSetting)("isShippingCostHidden",!1),h=(Object(n.getSetting)("woocommerceBlocksPhase",1),Object(n.getSetting)("wcBlocksAssetUrl","")),m=Object(n.getSetting)("shippingCountries",{}),w=Object(n.getSetting)("allowedCountries",{}),y=Object(n.getSetting)("shippingStates",{}),O=Object(n.getSetting)("allowedStates",{}),R=(Object(n.getSetting)("shippingMethodsExist",!1),Object(n.getSetting)("checkoutShowLoginReminder",!0)),j={id:0,title:"",permalink:""},_=Object(n.getSetting)("storePages",{shop:j,cart:j,checkout:j,privacy:j,terms:j}),k=_.shop.permalink,E=(_.checkout.id,_.checkout.permalink),x=_.privacy.permalink,S=_.privacy.title,P=_.terms.permalink,T=_.terms.title,C=(_.cart.id,_.cart.permalink),N=Object(n.getSetting)("checkoutAllowsGuest",!1);Object(n.getSetting)("checkoutAllowsSignup",!1),r(39)},9:function(e,t,r){"use strict";function n(){return(n=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var r=arguments[t];for(var n in r)Object.prototype.hasOwnProperty.call(r,n)&&(e[n]=r[n])}return e}).apply(this,arguments)}r.d(t,"a",(function(){return n}))},94:function(e,t,r){"use strict";var n=r(9),o=r(0),i=r(7);var a=function(e,t){return function(r){var n=e(r),o=r.displayName,a=void 0===o?r.name||"Component":o;return n.displayName="".concat(Object(i.upperFirst)(Object(i.camelCase)(t)),"(").concat(a,")"),n}},c=new WeakMap;function s(e){return Object(o.useMemo)((function(){return function(e){var t=c.get(e)||0;return c.set(e,t+1),t}(e)}),[e])}t.a=a((function(e){return function(t){var r=s(e);return Object(o.createElement)(e,Object(n.a)({},t,{instanceId:r}))}}),"withInstanceId")},98:function(e,t,r){"use strict";r.d(t,"a",(function(){return p}));var n=r(11),o=r.n(n),i=r(6),a=r.n(i),c=r(44),s=r(43);function u(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}function l(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?u(Object(r),!0).forEach((function(t){a()(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):u(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}var p=function(e){var t=e.Block,r=e.selector,n=e.getProps,i=void 0===n?function(){}:n,a=e.getErrorBoundaryProps,u=void 0===a?function(){}:a,p=document.querySelectorAll(r);p.length&&Array.prototype.forEach.call(p,(function(e,r){var n=i(e,r),a=u(e,r),p=l(l({},e.dataset),n.attributes);e.classList.remove("is-loading"),Object(c.render)(React.createElement(s.a,a,React.createElement(t,o()({},n,{attributes:p}))),e)}))}}});