$(document).ready(function() {
	
	$(window).on('click touchstart', function(e) {
		if (!document.querySelector('#gn-search-ui').contains(e.target) &&
			!document.querySelector('#gn-search-result-view').contains(e.target)
		) {
			globalNav.foldSearchInput();
		}
	})
	
	var globalNav = new Vue({
		
		el: '#globalnav',
		
		data: {
			
			searchResults: [
				{
					"keyword": "Apple",
					"link": "https://www.apple.com/"
				},
				{
					"keyword": "Google",
					"link": "https://www.google.com/"
				},
				{
					"keyword": "Microsoft",
					"link": "https://www.microsoft.com/"
				}
			],

			currentItem: "",
			
			searchKeyword: "",
			
			classFlags: {
				isSearchActive: false,
				isSearchResultActive: false
			}
			
		},
		
		methods: {
			
			expandSearchInput: function() {
				this.classFlags.isSearchActive = true;
				// this.classFlags.isSearchResultActive = true;
				this.$el.querySelector('#gn-search-input').focus();
			},
			
			foldSearchInput: function() {
				this.classFlags.isSearchActive = false;
				this.classFlags.isSearchResultActive = false;
				this.currentItem = "";
				this.$el.querySelector('#gn-search-input').blur();
			},
			
			handleSearchInputKeyUp: function(e) {
				if (e.which === 27) {
					// esc키 눌렀을 때
					// 검색창 닫기
					this.foldSearchInput();
					return;
				} else if (e.which === 38) {
					// 위키 눌렀을 때
					// 검색어 목록 이동
					console.log('pressed up key');
					e.preventDefault();
					if (this.currentItem === "") {
						this.currentItem = this.searchResults[this.searchResults.length - 1];
					} else {
						var nextIndex = this.searchResults.indexOf(this.currentItem) - 1;
						if (nextIndex < 0) {
							nextIndex = this.searchResults.length - 1;
						}
						this.currentItem = this.searchResults[nextIndex];
					}
				} else if (e.which === 40) {
					// 아래키 눌렀을 때
					console.log('pressed down key');
					e.preventDefault();
					document.querySelector('#gn-search-input').focus();
					if (this.currentItem === "") {
						this.currentItem = this.searchResults[0];
					} else {
						var nextIndex = this.searchResults.indexOf(this.currentItem) + 1;
						if (nextIndex >= this.searchResults.length) {
							nextIndex = 0;
						}
						this.currentItem = this.searchResults[nextIndex];
					}					
				} else if (e.which === 13) {
					var hovered = document.querySelector('.gn-sr-link.hover');
					if (hovered) {
						hovered.click();
					}
				}
				
				if (this.searchKeyword === "") {
					this.classFlags.isSearchResultActive = false;
				} else {
					this.classFlags.isSearchResultActive = true;
				}
			},

			handleSearchInputKeyDown: function(e) {
				if (e.which === 38 || e.which === 40) {
					e.preventDefault();
				}
			},
			
			handleMagnifierClick: function() {
				if ($(this.$el).hasClass('search-active')) {
					// 검색
					console.warn('검색 시작');
				} else {
					this.expandSearchInput();
				}
			}
			
		}
	})
	
});